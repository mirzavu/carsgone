<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\Province;
use App\Models\City;

use App\Http\Requests;
use DB;

class SearchController extends Controller
{
	protected $filters = array('province','city','model', 'make', 'year', 'condition','body', 'price', 'lat', 'lon');

    public function searchHandler(Request $request, $params)
	{

		$conditions = collect($request->only($this->filters));
		$param = explode('/', $params);
		foreach ($param as $key => &$value) {
			$value = explode('-', $value, 2);
			$conditions->put($value[0],$value[1]);
		}
		$loc = getLocation($request);
		$conditions->put('lat',$loc['lat']);
		$conditions->put('lon',$loc['lon']);
		$this->validateSaveConditions($request, $conditions);
		dd($conditions);
		

		
		$this->getFilterData($conditions);
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
		
		$result = $vehicles->get();
		dd($result);
		
		//$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
		

		$vehicles = Vehicle::where(function($q) use ($conditions){
		    if ($conditions->has('dealer_i')) {
		        $q->where('dealer_id', $conditions->get('dealer_id'));
		    }
		    return $q;
		})->whereHas('model', function($q) use ($conditions) {
		    if ($conditions->has('model')) {
		        $q->where('model_name', $conditions->get('model'));
		    }
		    return $q;
		});
		//$t=$vehicles->replicate();
		$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
		$result = $vehicles->get();
		dd($result);
	}

	public function getFilterData($conditions)
	{
		if(!$conditions->get('make'))
		{
			$filter_data['makes'] = Vehicle::ApplyFilter($conditions)->join('makes','makes.id','=','vehicles.make_id')->selectRaw('count(makes.id) as make_count, make_name')->groupBy('makes.make_name')->get();
		}
		if(!$conditions->get('city'))
		{
			//ApplyFilter($conditions)->
			$ss = Vehicle::ApplyFilter($conditions)
					->with(['dealer.province' => function($query) {
					    return $query->groupBy('province_name');
					}])->get();
			dd($ss);
			$ss = Province::where('province_name','=','Manitoba')->first()->cities()->withCount(['vehicles' => function ($query) use ($conditions) {
					    $query->applyFilter($conditions);

					}])->get();
			foreach ($ss as $value) {
				dd($value);
			}
		}
		dd($filter_data);
	}

    public function checkKey($key)
	{
		$keys = explode('-', $key);
		if(count($keys)>1 && in_array($keys[0], $this->filters))
			return true;
		else
			return false;
	}

    public function validateSaveConditions($request, &$conditions)
	{
		foreach ($conditions->all() as $key => $value) {
			if(in_array($key, $this->filters) && $value)
				$request->session()->put($key,  $value);
			else
				$conditions->forget($key);
		}
	}

}


