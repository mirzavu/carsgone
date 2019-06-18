<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
use App\Models\TransmissionType;
use DB;
use Log;

class FeedExport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:export';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Export CSV Feeds';

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
        
        $i = 1;
        Vehicle::with('user')
            ->where('vehicles.created_at', '>', DB::raw('DATE_SUB(NOW(),INTERVAL 1 YEAR)'))
            ->where('status_id', '1')
            ->chunk(10000, function($vehicles) use (&$i) {
            $columns = array('DealerName', 'DealerID',    'VIN', 'StockNumber', 'Year',    'Make',    'Model',   'Trim',    'Engine',  'Transmission',    'Cylinders',   'Type',    'ExteriorColor',   'InteriorColor',   'BodyStyle',   'Mileage', 'DriveTrain',  'ListingPrice',    'Description', 'Photos',  'Doors',   'DetailPageURL',   'InventoryDate');
            $csv[0] = $columns;
            $j=1;
            foreach ($vehicles as $vehicle) {
                $csv[$j][]=$vehicle->user->name;
                $csv[$j][]=$vehicle->user->id;
                $csv[$j][]=$vehicle->vin;
                $csv[$j][]=$vehicle->stock;
                $csv[$j][]=$vehicle->year;
                $csv[$j][]=$vehicle->make->make_name;
                $csv[$j][]=$vehicle->model->model_name;
                $csv[$j][]=$vehicle->trim;
                $csv[$j][]=$vehicle->engine_description;
                $csv[$j][]=$vehicle->transmission;
                $csv[$j][]=$vehicle->engine_cylinders;
                $csv[$j][]=$vehicle->condition;
                $csv[$j][]=$vehicle->ext_color->color?? "";
                $csv[$j][]=$vehicle->int_color->color?? "";
                $csv[$j][]=$vehicle->bodyStyleGroup->body_style_group_name?? "";
                $csv[$j][]=$vehicle->odometer;
                $csv[$j][]=null;
                $csv[$j][]=$vehicle->price;
                $csv[$j][]=$vehicle->text;
                $photo_str = [];
                foreach ($vehicle->photos as $photo)
                {
                    $photo_str[]=$photo->path;
                }
                $csv[$j][] = implode(',',$photo_str);
                $csv[$j][]=$vehicle->doors;
                $csv[$j][]='https://www.carsgone.com/vehicle/'.$vehicle->slug;
                $csv[$j][]=date('m-d-Y', strtotime($vehicle->created_at));
                $j++;
            }
            $path =  storage_path('feeds').'/export'.$i.'.csv';
            $ftp_conn=ftp_connect('ftp.r22dev.com');
            $csv_handler = fopen ($path,'w');
            $j=0;
            foreach ($csv as $line) {
                // dd($csv[1]);
                fputcsv ($csv_handler,$csv[$j++]);
            }
            
            fclose ($csv_handler);
            $csvh = fopen ($path,'r');
            @$login_result=ftp_login($ftp_conn, 'aultec', 'C8GtrQZGJwAj'); 
            if($login_result) $upload_result=ftp_fput($ftp_conn, 'export'.$i.'.csv', $csvh, FTP_ASCII);
            $i++;
        });
    }
}
