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
use App\Models\TransmissionType;
use DB;
use Log;
use Cache;

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

		// $data['provinces'] = Cache::remember('provinces', 30, function() {
		//     return Province::withCount('vehicles')->orderBy('province_name', 'asc')->get();
		// });

		// $data['makes'] = Cache::remember('makes', 30, function() {
		//     return Make::withCount('vehicles')->having('vehicles_count', '>', 0)->orderBy('make_name', 'asc')->get();
		// });

		// $data['body_style_groups'] = BodyStyleGroup::withCount('vehicles')->orderBy('body_style_group_name', 'asc')->get();

		// $prices = Cache::remember('prices', 30, function() {
		//     return DB::table('vehicles')->select(DB::raw('concat(5000*floor(price/5000),"-",5000*floor(price/5000) + 5000) as `range`,count(*) as `count`'))->groupBy('range')->get();
		// });
		
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
		$latest_ctime = 0;
		$vehicle_cnt = 0;
        $vehicle_upd = 0;
        $dealer_cnt = 0;
        $email = [];$i=0;
		$xml_directory   = storage_path('feeds/strathcom');
		$d               = dir($xml_directory);
		ini_set("max_execution_time",0);

		while (false !== ($entry = $d->read())) {
		    $filepath = "{$xml_directory}/{$entry}";
		    $ext      = pathinfo($entry, PATHINFO_EXTENSION);
		    $filename = pathinfo($entry, PATHINFO_FILENAME);
		    if (is_file($filepath) && filectime($filepath) > $latest_ctime && $ext == 'gz') {
		        $latest_ctime = filectime($filepath);
		        $xml_file     = $entry;
		    }
		}
		$file_name = $xml_directory .'/'. $xml_file;
		// Raising this value may increase performance
		$buffer_size = 4096; // read 4kb at a time
		$out_file_name = str_replace('.gz', '', $file_name); 
		/*$file = gzopen($file_name, 'rb');
		$out_file = fopen($out_file_name, 'wb'); 
		while (!gzeof($file)) {
		    fwrite($out_file, gzread($file, $buffer_size));
		}

		$out_file = null;*/
		$xmlReader = new \XMLReader();
		$xmlReader->open($out_file_name, null, 1 << 19);
		while ($xmlReader->read()) {
			if ($xmlReader->name === 'Dealer' && $xmlReader->nodeType == \XMLReader::ELEMENT) {
				$xml        = simplexml_load_string($xmlReader->readOuterXML());
				$dealer = Dealer::firstOrNew(['partner_id' => 1, 'partner_dealer_id' => $xml->PartyId]);

                $dealer->name = $xml->DealerName;
                $dealer->email = $xml->Contact->Email;
                $dealer->address = $xml->Address->AddressLine;
                $dealer->url = $xml->URI;
                $dealer->phone = $xml->Contact->Phone;
                $dealer->fax = $xml->Contact->Fax;
                $dealer->email = $xml->Contact->Email;
                $province_name = (string)$xml->Address->StateOrProvince;
                $province_name = ($province_name == "Newfoundland and Labrador")? "Newfoundland":$province_name; //Newfoundland and Labrador and Newfoundland are same
                $province_id = Province::where('province_name',$province_name)->value('id');
                $dealer->province_id = $province_id;
                $city = City::firstOrCreate(['city_name'=> (string)$xml->Address->City,'province_id'=> $province_id]);
                $dealer->city_id = $city->id;
                $dealer->postal_code = str_replace(' ', '', $xml->Address->PostalCode);
                $dealer->status = 1;

                if((empty($dealer->latitude) || empty($dealer->longitude)) && !empty($dealer->postal_code))
                {
                    $loc_json = file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($xml->Address->PostalCode)); //there is issue when striping space in postal code which has 5 alphanumerics, so using no stripped data
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
                $vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['dealer_id' => $dealer->id, 'partner_vehicle_id' => (string)$xml->SMI_ID]);
                $vehicle->condition = strtolower($xml->SaleClass); 
                $vehicle->status_id = 1;
                $vehicle->year = (string)$xml->ModelYear;
                $vehicle->vin = (string)$xml->VIN;
                $make_id = Make::where('make_name',(string) $xml->Make)->value('id');
                if($make_id)
                    $vehicle->make_id = $make_id;
                else
                {
                    $email[$i++] = "Make ".(string) $xml->Make;
                    continue;
                }
                $model_id = VehicleModel::where('model_name',(string) $xml->ModelDescription)->value('id');
                if($model_id)
                    $vehicle->model_id = $model_id;
                else
                {
                    $email[$i++] = "Model ".(string) $xml->Model." ".(string) $xml->Make;
                    continue;
                }
                $body_style_id = BodyStyleGroup::where('body_style_group_name',(string) $xml->BodyStyle)->value('id');
                if($body_style_id)
                    $vehicle->body_style_group_id = $body_style_id;
                else
                {
                    $email[$i++] = "Body_Style ".(string) $xml->Body_Style;
                    continue;
                }
                $ext_color = Color::firstOrCreate(['color' =>  (string)$xml->ExteriorColor]);
                $int_color = Color::firstOrCreate(['color' =>  (string)$xml->InteriorColor]);
                
                $vehicle->ext_color_id = $ext_color->id;
                $vehicle->int_color_id = $int_color->id;
                $TransmissionType = TransmissionType::firstOrCreate(['transmission' =>  (string)$xml->TransmissionType]);
                $vehicle->transmission_type_id = $TransmissionType->id;
                $vehicle->odometer = (int)$xml->DeliveryMileage;
                $vehicle->doors = (int)$xml->DoorsQuantity;
                $vehicle->passenger = (int)$xml->Seats;
                
                $vehicle->price = ($xml->VehiclePricing->VehiclePrice < 500000) ? (int)$xml->VehiclePricing->VehiclePrice : 500000;
                $vehicle->text = (string)$xml->VehicleNote;
                $vehicle->stock = $xml->VehicleStock;
                $vehicle->trim = (string)$xml->TrimCode;
                $fuel = FuelType::firstOrCreate(['fuel_type' =>  (string)$xml->FuelType]);
                $vehicle->fuel_id = $fuel->id;
                $vehicle->engine_description = (string)$xml->EngineDescription;
                $vehicle->engine_config = (string)$xml->EngineConfiguration;
                $vehicle->engine_displacement = (string)$xml->EngineDisplacement;
                $vehicle->engine_cylinders = (string)$xml->EngineCylinders;
                $vehicle->passenger = (int)$xml->Passengers;
                $drive_type = DriveType::firstOrCreate(['drive_type'=>(string) $xml->DriveTrain]);
                $vehicle->drive_type_id = $drive_type->id;
                $vehicle->certification = (string)$xml->CertificationIssuer;
                $vehicle->save();

                $vehicle->photos()->delete();
                $photos =[];
                $pos = 1;
                foreach($xml->ImageAttachment as $image) {
                    array_push($photos, new VehiclePhoto(['position' => $pos++, 'path' => (string)$image->URI]));
                }
                $vehicle->photos()->saveMany($photos);

                $vehicle->options()->delete();
                $option_ids =[];
                foreach($xml->Option as $option) {
                    $option = Option::firstOrCreate(['option' =>  (string)$option->OptionName]);
                    array_push($option_ids, $option->id);
                }
                $vehicle->options()->attach($option_ids);
            }
			
		}

		
	}

}
