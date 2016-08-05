<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{
    public function searchHandler($params)
	{
		$param = explode('/', $params);
		foreach ($param as $key => &$value) {
			if($this->checkKey($value))
			{
				$value = explode('-', $value);
			}
			else
			{
				
				unset($param[$key]);
			}
			
		}
		dd($param);
	}

    public function checkKey($key)
	{
		$keys = explode('-', $key);
		$attributes = array('make', 'model', 'province', 'city');
		if(count($keys)>1 && in_array($keys[0], $attributes))
			return true;
		else
			return false;
	}

}


