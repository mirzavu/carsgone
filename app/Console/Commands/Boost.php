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
use DB;
use Log;

class Boost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:boost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute boost feed';

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
        ini_set("max_execution_time",0);
        $starttime = date('Y-m-d H:i:s');

        $xml_directory   = storage_path('feeds/boost/');
        $xml_filename = 'Export';
        $local_file = $xml_directory . $xml_filename . date("Y-m-d") . '.xml';
        $server_file = $xml_filename . '.xml';
        $ftp_server = 'ftp.boostmotorgroup.com';
        $ftp_user_name = 'carsgone';
        $ftp_user_pass = 'boost2carsgone';

        exec("curl -u carsgone:boost2carsgone 'ftp://ftp.boostmotorgroup.com/Export.xml' -o ".$local_file);
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

        $vehicle_cnt = 0;
        $vehicle_upd = 0;
        $dealer_cnt = 0;
        $new_dealer_cnt=0;
        $new_dealers = "";
        $email = [];$i=0;

        while( $xmlReader->read() ) {

        //We've found a dealer in the XML stream and it's not an END_ELEMENT
            if($xmlReader->name == 'Dealership' && $xmlReader->nodeType == \XMLReader::ELEMENT) {

                $xml = simplexml_load_string( $xmlReader->readOuterXML() );
                $dealer = User::firstOrNew(['partner_id' => 2, 'partner_dealer_id' => $xml->Dealership_Boost_ID]);

                $dealer->name = (empty($dealer->name))?$xml->Dealership_Name:$dealer->name;
                $dealer->email = (empty($dealer->email))?$xml->Dealership_Email:$dealer->email;
                $dealer->address = (empty($dealer->address))?$xml->Dealership_Address:$dealer->address;
                $dealer->url = (empty($dealer->url))?$xml->Dealership_Website:$dealer->url;
                $dealer->phone = (empty($dealer->phone))?$xml->Dealership_Phone:$dealer->phone;

                $province_id = Province::where('province_code',(string) $xml->Dealership_Province)->value('id');
                $dealer->province_id = $province_id;
                $city = City::firstOrCreate(['city_name'=> (string)$xml->Dealership_City,'province_id'=> $province_id]);
                $dealer->city_id = $city->id;

                $dealer->postal_code = strpos((string)$xml->Dealership_Postal, ' ') == false && !empty((string)$xml->Dealership_Postal)? substr_replace((string)$xml->Dealership_Postal, ' ', 3, 0):(string)$xml->Dealership_Postal; //add space in middle if not there
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

            
            if($xmlReader->name == 'Vehicle' && $xmlReader->nodeType == \XMLReader::ELEMENT)
            {
                
                $xml = simplexml_load_string( $xmlReader->readOuterXML() );
                if($dealer->province_id != 9) //If not Alberta
                {
                    continue;
                }
                $vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['user_id' => $dealer->id, 'partner_vehicle_id' => (string)$xml->Boost_Vehicle_ID]);
                
                if($vehicle->exists)
                {
                    $vehicle->status_id = 1;
                    $price = (int)$xml->Price;
                    $vehicle->price = ($price < 500000) ? $price : 500000;
                    $vehicle->carproof = (string)$xml->CarProof;
                    
                    $vehicle->save();
                    
                    // Log::info(gettype($xml->Images->Photo));
                        
                    if(!empty($xml->Images->Photo) && VehiclePhoto::wherePath($xml->Images->Photo)->count() == 0)
                    {

                        $vehicle->photos()->delete();
                        $images = $xml->Images;

                        $photos =[];
                        if (is_array($images->Photo) || is_object($images->Photo))
                        {
                            foreach($images->Photo as $image) {
                                array_push($photos, ['position' => (string)$image['number'], 'path' => (string)$image, 'vehicle_id' => $vehicle->id]);
                            }
                        }
                        DB::table('vehicle_photos')->insert($photos);
                    }
                    continue;
                }
                $vehicle->condition = strtolower($xml->VehicleStatus); 
                $vehicle->status_id = 1;
                $vehicle->year = (string)$xml->Year;
                $vehicle->vin = (string)$xml->VIN;
                $make = Make::firstOrCreate(['make_name' => (string) $xml->Make]);
                
                $vehicle->make_id = $make->id;
                
                $model = VehicleModel::firstOrCreate(['model_name' => (string) $xml->Model, 'make_id' => $make->id]);
                
                $vehicle->model_id = $model->id;

                
                $body_style = (string) $xml->Body_Style;

                switch ($body_style) {
                    case 'Pickup Truck':
                        $body_style = "Truck";
                        break;
                    case 'Crossover':
                        $body_style = "SUV";
                        break;
                    case 'Minivan':
                        $body_style = "Van";
                        break;
                    case 'CAR':
                        $body_style = "Sedan";
                        break;
                    case 'Large Pick-up':
                        $body_style = "Truck";
                        break;
                    case '4dr Car':
                        $body_style = "Sedan";
                        break;
                    case 'Compact':
                        $body_style = "SUV";
                        break;
                }

                $vehicle->body_style_group_id = BodyStyleGroup::firstOrCreate(['body_style_group_name' => $body_style])->id;

                $ext_color = Color::firstOrCreate(['color' =>  (string)$xml->Exterior_Colour]);
                $int_color = Color::firstOrCreate(['color' =>  (string)$xml->Interior_Colour]);
                $vehicle->ext_color_id = $ext_color->id;
                $vehicle->int_color_id = $int_color->id;
                $vehicle->odometer = (int)$xml->Mileage;
                $vehicle->doors = (int)$xml->Doors;
                $vehicle->passenger = (int)$xml->Seats;
                $vehicle->transmission = (string)$xml->Transmission == "Manual"? 'manual' : 'auto';
                $price = (int)$xml->Price;
                $vehicle->price = ($price < 500000) ? $price : 500000;
                $vehicle->text = (string)$xml->Description;
                $vehicle->stock = $xml->Stock_Number;
                $vehicle->trim = (string)$xml->SubModel_Trim;
                $vehicle->engine_description = (string)$xml->Engine_Capacity;
                $vehicle->engine_cylinders = (string)$xml->Cylinders;
                //$vehicle->slug = null;
                $vehicle->save();
                //echo $vehicle->slug;exit;

                if(!empty($xml->Images->Photo) && VehiclePhoto::wherePath($xml->Images->Photo)->count() == 0)
                {

                    $vehicle->photos()->delete();
                    $images = $xml->Images;

                    $photos =[];
                    if (is_array($images->Photo) || is_object($images->Photo))
                    {
                        foreach($images->Photo as $image) {
                            array_push($photos, ['position' => (string)$image['number'], 'path' => (string)$image, 'vehicle_id' => $vehicle->id]);
                        }
                    }
                    DB::table('vehicle_photos')->insert($photos);
                }
                
                //dd($vehicle->photo());

                // $vehicle->options()->detach();

                // $options = $xml->Features;
                // $option_ids =[];
                // foreach($options->Feature as $option) {
                //     $option = Option::firstOrCreate(['option' =>  (string)$option]);
                //     array_push($option_ids, $option->id);
                // }
                // $vehicle->options()->attach($option_ids);
            }
        }
        arsort($email);
        echo "Start time: ". $starttime;
        echo "\nEnd time: ".  date('Y-m-d H:i:s');
        Log::info($email);
    }
}
