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

class Carpages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:carpages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Execute Carpages feed';

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

        $xml_directory   = storage_path('feeds/carpages/');
        $xml_filename = 'Export';
        $local_file = $xml_directory . $xml_filename . date("Y-m-d") . '.csv';
        $ftp_server = 'ftp.carpages.ca';
        $ftp_user_name = 'eal';
        $ftp_user_pass = 'shortcoral55';

        exec("curl -u eal:shortcoral55 'ftp://ftp.carpages.ca/export.csv' -o ".$local_file);
        $csvData = file_get_contents($local_file);
        
        $lines = explode(PHP_EOL, $csvData);
        foreach ($lines as $line) {
            $lines[] = str_getcsv($line);
        }

        $vehicle_cnt = 0;
        $vehicle_upd = 0;
        $dealer_cnt = 0;
        $new_dealer_cnt=0;
        $new_dealers = "";
        $email = [];$i=0;

        foreach ($lines as $line) {
            
            if(isset($line[0]) && $line[0]=='30893')
            {
                
                $dealer_id='1133';
                $vehicle = Vehicle::withoutGlobalScopes()->firstOrNew(['user_id' => $dealer_id, 'partner_vehicle_id' => (string)$line[1]]);
                
                if($vehicle->exists)
                {
                    $vehicle->status_id = 1;
                    $vehicle->price = ($line[10] < 500000) ? (int)$line[10] : 500000;
                    $vehicle->mrp = ($line[11] < 500000) ? (int)$line[11] : 500000;
                    
                    $vehicle->save();
                    
                    // Log::info(gettype($xml->Images->Photo));
                        
                    $images = explode(';', $line[17]);

                    if(count($images) && VehiclePhoto::wherePath($images[0])->count() == 0)
                    {
                        $vehicle->photos()->delete();
                        $photos =[];
                        $i=0;
                        foreach($images as $image) {
                            array_push($photos, ['position' => (string)$i, 'path' => (string)$image, 'vehicle_id' => $vehicle->id]);
                            $i++;
                        }
                        
                        DB::table('vehicle_photos')->insert($photos);
                    }
                    continue;
                }
                $vehicle->condition = 'used'; 
                $vehicle->status_id = 1;
                $vehicle->year = $line[2];
                $vehicle->vin = $line[8];
                $make = Make::firstOrCreate(['make_name' => $line[3]]);
                
                $vehicle->make_id = $make->id;
                
                $model = VehicleModel::firstOrCreate(['model_name' => $line[4], 'make_id' => $make->id]);
                
                $vehicle->model_id = $model->id;

                
                $body_style = trim($line[6]);

                if(in_array($body_style, ['Motorcycle','']))

                switch ($body_style) {
                    case 'Pickup Truck':
                        $body_style = "Truck";
                        break;
                    case 'Coupe':
                        $body_style = "Coupe";
                        break;
                    case 'Crossover':
                        $body_style = "SUV";
                        break;
                    case 'SUV / Crossover':
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
                    case 'Commercial':
                        $body_style = "Truck";
                        break;
                    case 'Wagon':
                        $body_style = "Wagon";
                        break;
                    case 'Motorcycle':
                        $body_style = "Motorcycle";
                        break;
                    case 'Sedan':
                        $body_style = "Sedan";
                        break;
                    default:
                        $body_style = 'Truck';
                        break;
                }

                $vehicle->body_style_group_id = BodyStyleGroup::firstOrCreate(['body_style_group_name' => $body_style])->id;

                $ext_color = Color::firstOrCreate(['color' =>  $line[13]]);
                $int_color = Color::firstOrCreate(['color' =>  $line[14]]);
                $vehicle->ext_color_id = $ext_color->id;
                $vehicle->int_color_id = $int_color->id;
                $vehicle->odometer = $line[9];
                $vehicle->doors = (int)$line[20];
                $vehicle->transmission = (string)$line[12] == "Automatic"? 'auto' : 'manual';
                $vehicle->price = ($line[10] < 500000) ? (int)$line[10] : 500000;
                $vehicle->text = (string)$line[15];
                $vehicle->stock = $line[5];
                $vehicle->trim = (string)$line[7];
                $vehicle->engine_cylinders = (string)$line[18];
                $vehicle->save();
                //echo $vehicle->slug;exit;

                $images = explode(';', $line[17]);

                if(count($images) && VehiclePhoto::wherePath($images[0])->count() == 0)
                {
                    $vehicle->photos()->delete();
                    $photos =[];
                    $i=0;
                    foreach($images as $image) {
                        array_push($photos, ['position' => (string)$i, 'path' => (string)$image, 'vehicle_id' => $vehicle->id]);
                        $i++;
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
