<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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

class Strathcom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:strathcom';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute Strathcom feed';

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
        $file = gzopen($file_name, 'rb');
        $out_file = fopen($out_file_name, 'wb'); 
        while (!gzeof($file)) {
            fwrite($out_file, gzread($file, $buffer_size));
        }

        $out_file = null;
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
                $dealer->postal_code = strpos((string)$xml->Address->PostalCode, ' ') == false && !empty((string)$xml->Address->PostalCode)? substr_replace((string)$xml->Address->PostalCode, ' ', 3, 0):(string)$xml->Address->PostalCode; //add space in middle if not there
                $dealer->status = 1;

                if((empty($dealer->latitude) || empty($dealer->longitude)) && !empty($dealer->postal_code))
                {
                    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($dealer->postal_code);
                    $curl = curl_init();

                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    $loc_json = curl_exec($curl);
                    $retry = 0;
                    var_dump($loc_json);
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
                $dealer->save();
                echo "\nDealer Name found in DB: " . $dealer->name . ' : Dealer ID: '.$dealer->id."\n";
                $dealer_cnt++;
                Vehicle::where('dealer_id', $dealer->id)->update(['status_id' => 2]);
            }

            if($xmlReader->name == 'Vehicle' && $xmlReader->nodeType == \XMLReader::ELEMENT) {
                $xml = simplexml_load_string( $xmlReader->readOuterXML() );
                $vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['dealer_id' => $dealer->id, 'partner_vehicle_id' => (string)$xml->SMI_ID]);
                if ($vehicle->exists) {
                    continue;
                }
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
                $model_id = VehicleModel::where([
                        ['model_name', '=', (string) $xml->ModelDescription],
                        ['make_id', '=', $make_id]
                    ])->value('id');
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
