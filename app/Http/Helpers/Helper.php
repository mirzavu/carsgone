<?php // Code within app\Helpers\Helper.php

namespace App\Http\Helpers;

use App\Models\Setting;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    public static function setting($type)
    {
    	$setting = Setting::first();
        switch ($type) {
        	case 'address':
        		return $setting->address;
        		break;
        	case 'postal_code':
        		return $setting->postal_code;
        		break;
        	case 'phone':
        		return $setting->phone;
        		break;
        	
        	default:
        		# code...
        		break;
        }
    }
}