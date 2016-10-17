<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
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
        $starttime = "\nProgram Start time:" . date(DATE_RFC822);

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
        $id_maps = Dealer::select(array('id', 'partner_dealer_id'))->where('partner_id',2)->get();
        
        $feed_dealers = array();
        foreach ($id_maps as $value) {
            $feed_dealers[$value->partner_dealer_id] = $value->id;
        }
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
                    $dealer->latitude = $loc_array->results[0]->geometry->location->lat;
                    $dealer->longitude = $loc_array->results[0]->geometry->location->lng;
                }

                $dealer->status = 1;
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
                $model_id = VehicleModel::where([
                        ['model_name', '=', (string) $xml->Model],
                        ['make_id', '=', $make_id]
                    ])->value('id');
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
