<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Http\Requests;
use Illuminate\Http\Request;

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

	public function searchTerm($term)
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
			$search_param.= "content-".$content_param;
		}
		echo $search_param;exit;
	}

	public function getModels($make_id)
	{
		$models = VehicleModel::where('make_id',"=",$make_id)->get();
		echo json_encode($models);
	}

	public function fb()
	{
		ini_set("max_execution_time",0);
        $starttime = "\nProgram Start time:" . date(DATE_RFC822);

        $xml_directory   = '../storage/feeds/boost/';
        $xml_filename = 'Export';
        $local_file = $xml_directory . $xml_filename . date("Y-m-d") . '.xml';

        $server_file = $xml_filename . '.xml';
        $ftp_server = 'ftp.boostmotorgroup.com';
        $ftp_user_name = 'carsgone';
        $ftp_user_pass = 'boost2carsgone';

        //exec("curl -u carsgone:boost2carsgone 'ftp://ftp.boostmotorgroup.com/Export.xml' -o ".$local_file);
        $xmlReader = new \XMLReader;
        $xmlReader->open($local_file);

        $province_hash = array(
            "AB" => "Alberta",
            "ON" => "Ontario",
            "NF" => "Newfoundland",
            "SK" => "Saskatchewan",
            "YK" => "Yukon",
            "NB" => "New Brunswick",
            "NS" => "Nova Scotia",
            "NT" => "North West Territories",
            "BC" => "British Columbia",
            "QC" => "Quebec",
            "MB" => "Manitoba",
            "PE" => "Prince Edward Island"
            );
        $id_maps = Dealer::select(array('id', 'partner_dealer_id'))->where('partner_id',2)->get();
        
        $feed_dealers = array();
        foreach ($id_maps as $value) {
            $feed_dealers[$value->partner_dealer_id] = $value->id;
        }
        $vehicle_cnt = 0;
        $vehicle_upd = 0;
        $dealer_cnt = 0;
        $abnormal_dealer ="";
        $abnormal_dealer_cnt = 0;
        $new_dealer_cnt=0;
        $new_dealers = "";
        $email = [];$i=0;

        while( $xmlReader->read() ) {

        //We've found a dealer in the XML stream and it's not an END_ELEMENT
            if($xmlReader->name == 'Dealership' && $xmlReader->nodeType == \XMLReader::ELEMENT) {

                $xml = simplexml_load_string( $xmlReader->readOuterXML() );
                $dealer = Dealer::firstOrNew(['partner_id' => 2, 'partner_dealer_id' => $xml->Dealership_Boost_ID]);

                $dealer->name = $xml->Dealership_Name;
                $dealer->email = $xml->Dealership_Email;
                $dealer->address = $xml->Dealership_Address;
                $dealer->url = $xml->Dealership_Website;
                $dealer->phone = $xml->Dealership_Phone;
        		$dealer->email = $xml->Dealership_Email;

        		$province_id = Province::where('province_code',(string) $xml->Dealership_Province)->value('id');
        		$dealer->province_id = $province_id;
        		$city = City::firstOrCreate(['city_name'=> (string)$xml->Dealership_City,'province_id'=> $province_id]);
        		$dealer->city_id = $city->id;
        		$dealer->postal_code = $xml->Dealership_Postal;
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

            
            if($xmlReader->name == 'Vehicle' && $xmlReader->nodeType == \XMLReader::ELEMENT) {
            	$xml = simplexml_load_string( $xmlReader->readOuterXML() );
            	$vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['dealer_id' => $dealer->id, 'partner_vehicle_id' => (string)$xml->Boost_Vehicle_ID]);
            	$vehicle->condition = strtolower($xml->VehicleStatus); 
    			$vehicle->status_id = 1;
				$vehicle->year = (string)$xml->Year;
				$vehicle->vin = (string)$xml->VIN;
				$make_id = Make::where('make_name',(string) $xml->Make)->value('id');
				if($make_id)
					$vehicle->make_id = $make_id;
				else
				{
					$email[$i++] = "Make ".(string) $xml->Make;
					continue;
				}
				$model_id = VehicleModel::where('model_name',(string) $xml->Model)->value('id');
				if($model_id)
					$vehicle->model_id = $model_id;
				else
				{
					$email[$i++] = "Model ".(string) $xml->Model." ".(string) $xml->Make;
					continue;
				}
				$body_style_id = BodyStyleGroup::where('body_style_group_name',(string) $xml->Body_Style)->value('id');
				if($body_style_id)
					$vehicle->body_style_group_id = $body_style_id;
				else
				{
					$email[$i++] = "Body_Style ".(string) $xml->Body_Style;
					continue;
				}
				$ext_color = Color::firstOrCreate(['color' =>  (string)$xml->Exterior_Colour]);
				$int_color = Color::firstOrCreate(['color' =>  (string)$xml->Interior_Colour]);
				$vehicle->ext_color_id = $ext_color->id;
				$vehicle->int_color_id = $int_color->id;
				$vehicle->odometer = (int)$xml->Mileage;
				$vehicle->doors = (int)$xml->Doors;
				$vehicle->passenger = (int)$xml->Seats;
				$vehicle->transmission = (string)$xml->Transmission == "Manual"? 'manual' : 'auto';
				$vehicle->price = ($xml->Price < 500000) ? (int)$xml->Price : 500000;
				$vehicle->text = (string)$xml->Description;
				$vehicle->stock = $xml->Stock_Number;
				$vehicle->trim = (string)$xml->SubModel_Trim;
				$vehicle->engine_description = (string)$xml->Engine_Capacity;
				$vehicle->engine_cylinders = (string)$xml->Cylinders;
				//$vehicle->slug = null;
				$vehicle->save();
				//echo $vehicle->slug;exit;
				$vehicle->photos()->delete();
				//$vehicle->options()->delete();

				$images = $xml->Images;

				$photos =[];
				foreach($images->Photo as $image) {
					array_push($photos, new VehiclePhoto(['position' => (string)$image['number'], 'path' => (string)$image]));
				}
				$vehicle->photos()->saveMany($photos);
				//dd($vehicle->photo());

				$vehicle->options()->delete();

				$options = $xml->Features;
				$option_ids =[];
				foreach($options->Feature as $option) {
					$option = Option::firstOrCreate(['option' =>  (string)$option]);
					array_push($option_ids, $option->id);
				}
				$vehicle->options()->attach($option_ids);
            }
        }
        dd($email);
	}

}
