<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

use App\Http\Requests;

class SearchController extends Controller
{
    public function searchHandler(Request $request, $params)
	{

		$conditions = collect($request->only(['model', 'dealer_id', 'year', 'valueMin', 'valueMax']));
		$param = explode('/', $params);
		foreach ($param as $key => &$value) {
			if($this->checkKey($value))
			{
				$value = explode('-', $value);
				$conditions->put($value[0],$value[1]);
			}
		}
		//dd($conditions);
		/*$vehicles = new Vehicle();
        if($request->input('model'))
        {
           $vehicles =  $vehicles->whereHas('model', function($q)
            {
                $q->where('model_name', '=', 'CL');

            });

        }

        $vehicles = $vehicles->where('dealer_id', '=', '15');

        $result = $vehicles->get();
        dd($result);*/


		$vehicles = Vehicle::where(function($q) use ($conditions){
		    if ($conditions->get('dealer_id')) {
		        $q->where('dealer_id', $conditions->get('dealer_id'));
		    }

		    return $q;
		})->whereHas('model', function($q) use ($conditions) {
		    return $q->where(['model_name'=>'CL']);
		});
		$result = $vehicles->get();
		dd($result);

	}

    public function checkKey($key)
	{
		$keys = explode('-', $key);
		$attributes = array('make', 'model', 'province', 'city','dealer_id');
		if(count($keys)>1 && in_array($keys[0], $attributes))
			return true;
		else
			return false;
	}

}


