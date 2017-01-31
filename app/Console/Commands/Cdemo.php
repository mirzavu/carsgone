<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\User;
use App\Models\Vehicle;
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

class Cdemo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:cdemo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute cdemo feed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
                    $dealer = User::firstOrNew(['partner_id' => 3, 'partner_dealer_id' => $dealer_xml->dealer_code]);
                    $dealer->name = $dealer_xml->dealer_name;
                    $dealer->address = $dealer_xml->dealer_address;
                    $dealer->url = $dealer_xml->dealer_website;
                    $dealer->phone = $dealer_xml->dealer_phone;
                    $dealer->fax = $dealer_xml->dealer_fax;

                    $province_id = Province::where('province_code',(string) $dealer_xml->dealer_province)->value('id');
                    $dealer->province_id = $province_id;
                    $city = City::firstOrCreate(['city_name'=> (string)$dealer_xml->dealer_city,'province_id'=> $province_id]);
                    $dealer->city_id = $city->id;

                    $dealer->postal_code = strpos((string)$dealer_xml->dealer_postal_code, ' ') == false && !empty((string)$dealer_xml->dealer_postal_code)? substr_replace((string)$dealer_xml->dealer_postal_code, ' ', 3, 0):(string)$dealer_xml->dealer_postal_code; //add space in middle if not there
                    if((empty($dealer->latitude) || empty($dealer->longitude)) && !empty($dealer->postal_code))
                    {
                        $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($dealer->postal_code);
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        curl_setopt($curl, CURLOPT_HEADER, false);
                        $loc_json = curl_exec($curl);
                        $retry = 0;
                        $loc_array = json_decode($loc_json);
                        while($loc_array->status == "UNKNOWN_ERROR" && $retry < 5){
                            $loc_json = curl_exec($curl);
                            $loc_array = json_decode($loc_json);
                            $retry++;
                        }
                        curl_close($curl);
                        if($loc_array->status == "OK")
                        {
                            $dealer->latitude = $loc_array->results[0]->geometry->location->lat;
                            $dealer->longitude = $loc_array->results[0]->geometry->location->lng;
                        }  
                    }

                    $dealer->status_id = 1;
                    $dealer->role = 'dealer';
                    $dealer->save();
                    echo "\nDealer Name found in DB: " . $dealer->name . ' : Dealer ID: '.$dealer->id."\n";
                    $dealer_cnt++;
                    Vehicle::where('user_id', $dealer->id)->update(['status_id' => 2]);
                    
                }

                if (strcmp($node->getname(), 'vehicle') == 0) {
                    $vehicle_xml = $node;
                    $vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['user_id' => $dealer->id, 'vin' => (string)$vehicle_xml->vin]);

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
                    $model_id = VehicleModel::where([
                        ['model_name', '=', (string) $vehicle_xml->model],
                        ['make_id', '=', $make_id]
                    ])->value('id');
                    if($model_id)
                        $vehicle->model_id = $model_id;
                    else
                    {
                        $email[$i++] = $model_id." Model ".(string) $vehicle_xml->model." ".(string) $vehicle_xml->make.$make_id;
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
                    $vehicle->vin = (string)$vehicle_xml->vin;
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
            
        Log::info($email);
    }
}
