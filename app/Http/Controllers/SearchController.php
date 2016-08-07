<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;

use App\Http\Requests;
use DB;

class SearchController extends Controller
{
    public function searchHandler(Request $request, $params)
	{

		$conditions = collect($request->only(['province','city','model', 'make', 'year', 'minPrice', 'maxPrice']));
		$param = explode('/', $params);
		foreach ($param as $key => &$value) {
			if($this->checkKey($value))
			{
				$value = explode('-', $value);
				$conditions->put($value[0],$value[1]);
			}
		}
		$loc = getLocation($request);
		$conditions->put('lat',$loc['lat']);
		$conditions->put('lon',$loc['lon']);
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
        $vehicles = Vehicle::applyFilter($conditions);
		$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
		$result = $vehicles->get();
		dd($result);

		$vehicles = Vehicle::where(function($q) use ($conditions){
		    if ($conditions->get('dealer_i')) {
		        $q->where('dealer_id', $conditions->get('dealer_id'));
		    }

		    return $q;
		})->whereHas('model', function($q) use ($conditions) {
		    return $q->where(['model_name'=>'CL']);
		});
		//$t=$vehicles->replicate();
		$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
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


