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
    ini_set('memory_limit', '2G');
    ini_set('max_execution_time', 0);
    $storage_null_url = DB::table('vehicle_photos')->where([['path', '!=', ''],['storage_url', '=', NULL]])->get();

    foreach ($storage_null_url as $key) {
      if ($key->path) {
        $link_array = explode('.',$key->path);
        $ext = end($link_array);
        $vehicle_slug = Vehicle::where('id',$key->vehicle_id)->value('slug');

        $filePath = 'used/car/'.$vehicle_slug.'-'.$key->position.'.'.$ext;
        
        $ch = curl_init ($key->path);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
        $raw=curl_exec($ch);
        $retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);

        if ($retcode == 200) {
          $a=Storage::disk('s3')->put($filePath, $raw, 'public');
          if($a)
          {
            $new_urls=Storage::disk('s3')->url($filePath);
            
            $new_url=str_replace("https://s3.ca-central-1.amazonaws.com/","http://",$new_urls);
            Log::info($new_url);
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
        else
        {
          $b=DB::table('vehicle_photos')->where('id', '=', $key->id)->update(['storage_url' => '']);
        }

      }

    }
  }
}
