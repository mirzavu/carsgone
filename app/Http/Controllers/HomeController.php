<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\City;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\BodyStyleGroup;
use App\Models\Color;
use App\Models\VehiclePhoto;
use App\Models\Option;
use App\Models\BodyStyle;
use App\Models\DriveType;
use App\Models\FuelType;
use DB;
use Log;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        //$this->middleware('auth');
    }

	public function index(Request $request)
	{	
		$data['total'] = Vehicle::count();
		$data['location'] = getLocation($request);
		$data['provinces'] = Province::withCount('vehicles')->orderBy('province_name', 'asc')->get();
		$data['makes'] = Make::withCount('vehicles')->having('vehicles_count', '>', 0)->orderBy('make_name', 'asc')->get();

		$data['body_style_groups'] = BodyStyleGroup::withCount('vehicles')->orderBy('body_style_group_name', 'asc')->get();

		$prices = DB::table('vehicles')->select(DB::raw('concat(5000*floor(price/5000),"-",5000*floor(price/5000) + 5000) as `range`,count(*) as `count`'))->groupBy('range')->get();
		
		$data['prices'] = $this->format_price_range($prices);
		$data['count'] = Vehicle::where('status_id', 1)->count();
		return view('front.home', $data);
	}

	public function format_price_range(&$prices)
	{
		foreach ($prices as &$price) 
		{
			$range = explode('-', $price->range);
			$range[0] = '$'.$range[0];
			$range[1] = '$'.$range[1];
			$price->formatrange = join(" - ", $range);
		}
		return $prices;
	}

	public function searchTerm(Request $request, $term)
	{
		$terms = explode(" ",$term);
		$flags = array('make' => 0,'model' =>0, 'province'=>0, 'city'=>0 );
		$search_param ='';
		foreach ($terms as $key => $keyword) {
			if(Make::where('make_name',"LIKE","%$keyword%")->count() && $flags['make']==0)
			{
				$param = Make::where('make_name',"LIKE","%$keyword%")->first();
				unset($terms[$key]);
				$search_param .= "make-".$param->make_name."/";
				$flags['make']=1;
			}
			elseif (Province::where('province_name',"=","$keyword")->count()  && $flags['province']==0) 
			{	
				$param = Province::where('province_name',"=","$keyword")->first();
				$search_param .= "province-".$param->province_name."/";
				unset($terms[$key]);
				$flags['province']=1;
			}
			elseif (VehicleModel::where('model_name',"=","$keyword")->count()  && $flags['model']==0) 
			{	
				$param = VehicleModel::where('model_name',"=","$keyword")->first();
				$search_param .= "make-".$param->make()->first()->make_name."/model-".$param->model_name."/";
				unset($terms[$key]);
				$flags['model']=1;
			}
		}
		if(count($terms))
		{
			$content_param = implode(" ", $terms);
			$request->session()->put('content',$content_param);
		}
		echo $search_param;
	}

	public function getModels($make_id)
	{
		$models = VehicleModel::where('make_id',"=",$make_id)->get();
		echo json_encode($models);
	}

	public function fb()
	{
		$cdemo_feeds = array("cdemo_carsgone.xml","cdemo_carsgone_2.xml");
		ini_set("max_execution_time",0);
        $starttime = "\nProgram Start time:" . date(DATE_RFC822);
        $dealer_cnt = 0;
        $newvehicle_cnt = 0;
        $updvehicle_cnt = 0;
        $email = [];$i=0;
        foreach ($cdemo_feeds as $xml_name) {
        	$xmlfile = storage_path('feeds/cdemo/'.$xml_name);
	        $xml_str   = file_get_contents($xmlfile);
	        $xml_str   = str_replace("&", "and", $xml_str);
	        $file      = fopen($xmlfile, "w");
	        fwrite($file, $xml_str);
	        fclose($file);
	        $xmldata     = simplexml_load_file($xmlfile);
	        
	        foreach ($xmldata->children() as $node) {
	            if (strcmp($node->getname(), 'dealer_info') == 0) {
	                $dealer_xml = $node;
	                // echo str_replace(' ', '', $dealer->dealer_postal_code);exit;
	                $dealer = Dealer::firstOrNew(['partner_id' => 3, 'partner_dealer_id' => $dealer_xml->dealer_code]);
	                $dealer->name = $dealer_xml->dealer_name;
	                $dealer->address = $dealer_xml->dealer_address;
	                $dealer->url = $dealer_xml->dealer_website;
	                $dealer->phone = $dealer_xml->dealer_phone;
	                $dealer->email = $dealer_xml->dealer_fax;

	                $province_id = Province::where('province_code',(string) $dealer_xml->dealer_province)->value('id');
	                $dealer->province_id = $province_id;
	                $city = City::firstOrCreate(['city_name'=> (string)$dealer_xml->dealer_city,'province_id'=> $province_id]);
	                $dealer->city_id = $city->id;
	                $dealer->postal_code = str_replace(' ', '', $dealer_xml->dealer_postal_code);
	                $dealer->status = 1;

	                if((empty($dealer->latitude) || empty($dealer->longitude)) && !empty($dealer->postal_code))
	                {
	                    $loc_json = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($dealer->postal_code));
	                    $loc_array = json_decode($loc_json);
	                    $dealer->latitude = $loc_array->results[0]->geometry->location->lat;
	                    $dealer->longitude = $loc_array->results[0]->geometry->location->lng;
	                }
	                $dealer->save();
	                echo "\nDealer Name found in DB: " . $dealer->name . ' : Dealer ID: '.$dealer->id."\n";
	                $dealer_cnt++;
	                Vehicle::where('dealer_id', $dealer->id)->update(['status_id' => 2]);
	                
	            }

			    if (strcmp($node->getname(), 'vehicle') == 0) {
			    	$vehicle_xml = $node;
			        $vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['dealer_id' => $dealer->id, 'vin' => (string)$vehicle_xml->vin]);

			        $vehicle->condition = $vehicle_xml->class == "New Auto"? "new":"used"; 
			        $vehicle->stock = $vehicle_xml->stock;
			        $vehicle->year = (string)$vehicle_xml->year;
	                $make_id = Make::where('make_name',(string) $vehicle_xml->make)->value('id');
	                if($make_id)
	                    $vehicle->make_id = $make_id;
	                else
	                {
	                    $email[$i++] = "Make ".(string) $vehicle_xml->make;
	                    continue;
	                }
	                $model_id = VehicleModel::where('model_name',(string) $vehicle_xml->model)->value('id');
	                if($model_id)
	                    $vehicle->model_id = $model_id;
	                else
	                {
	                    $email[$i++] = "Model ".(string) $vehicle_xml->model." ".(string) $vehicle_xml->make;
	                    continue;
	                }
	                $vehicle->trim = (string)$vehicle_xml->trim;
	                $body_style = BodyStyle::firstOrCreate(['body_style_name' =>  (string)$vehicle_xml->body]);
	                $vehicle->body_style_id = $body_style->id;
	                $vehicle->doors = (int)$vehicle_xml->doors;
	                $drive_type_id = DriveType::where('drive_type',(string) $vehicle_xml->drive)->value('id');
	                if($drive_type_id)
	                	$vehicle->drive_type_id = $drive_type_id;
	                $vehicle->transmission = (string)$vehicle_xml->transmission == "Manual"? 'manual' : 'auto';
	                $fuel = FuelType::firstOrCreate(['fuel_type' =>  (string)$vehicle_xml->fuel]);
	                $vehicle->fuel_id = $fuel->id;
	                $vehicle->engine_cylinders = (string)$vehicle_xml->eng_cyl;
	                $vehicle->engine_config = (string)$vehicle_xml->eng_size;
	          
	                $ext_color = Color::firstOrCreate(['color' =>  (string)$vehicle_xml->extcolour]);
	                $int_color = Color::firstOrCreate(['color' =>  (string)$vehicle_xml->intcolour]);
	                $vehicle->ext_color_id = $ext_color->id;
	                $vehicle->int_color_id = $int_color->id;
	                $vehicle->odometer = (int)$vehicle_xml->odometer;
	                $vehicle->certification = (string)$vehicle_xml->certified_line;
	                $vehicle->passenger = (int)$vehicle_xml->passengers;
					$vehicle->mrp = (int)$vehicle_xml->msrp;
					$vehicle->price = (int)$vehicle_xml->standard_price;
	                $vehicle->status_id = 1;
	                $vehicle->text = (string)$vehicle_xml->special_mention;
	                $vehicle->save();

	                $vehicle->photos()->delete();
	                $photos =[];
	                foreach($vehicle_xml->image as $image) {
	                    array_push($photos, new VehiclePhoto(['position' => (string)$image['rank'], 'path' => (string)$image]));
	                }
	                $vehicle->photos()->saveMany($photos);

	                $vehicle->options()->delete();
	                $option_ids =[];
	                foreach($vehicle_xml->option as $option) {
	                    $option = Option::firstOrCreate(['option' =>  (string)$option]);
	                    array_push($option_ids, $option->id);
	                }
	                $vehicle->options()->attach($option_ids);
		
			        
			    }
	        }
        }
	        
        dd($email);
	}

}
