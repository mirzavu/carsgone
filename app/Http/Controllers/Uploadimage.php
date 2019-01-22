<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
use App\Http\Requests;
use DB;
use Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use SEO;
use SEOMeta;
use Illuminate\Pagination\LengthAwarePaginator;
use Cookie;
use Storage;

class Uploadimage extends Controller
{
  public function index()
  {
    //$photos =[];
    $storage_null_url = DB::table('vehicle_photos')->where([['path', '!=', ''],['storage_url', '=', NULL]])->get();
    //var_dump($storage_null_url);
    foreach ($storage_null_url as $key) {
      if ($key->path) {
        //$file=$key->path;
        //file_put_contents("Tmpfile.zip", fopen("$file", 'r'));
        //$name =$file;
        //echo $file;
        //$link = $file;
        $link_array = explode('/',$key->path);
        $page = end($link_array);
        $vehicle_slug = Vehicle::where('id',$key->vehicle_id)->value('slug');
        //echo($vehicle_slug);$filePath = 'newedmont/images'.$page;
        $filePath = 'used/car/'.$vehicle_slug.$page;
        $file_contents=file_get_contents($key->path);
        if ($file_contents) {
          $a=Storage::disk('s3')->put($filePath, $file_contents, 'public');
          if($a)
          {
            $new_url=Storage::disk('s3')->url($filePath);
            if ($new_url)
            {
              echo 'Inserted To amazones3 <br>';
              //array_push($photos, ['storage_url' => (string)$new_url]);
              $b=DB::table('vehicle_photos')->where('id', '=', $key->id)->update(['storage_url' => (string)$new_url]);
              if($b)
              {
                echo 'inserted to DB<br><br>';
              }else {
                echo 'failed insert Database<br><br>';
              }
            }else {
              echo 'failed insert amazones3<br>';
            }
          }
        }


      }

    }
echo 'hii';
  }
}
