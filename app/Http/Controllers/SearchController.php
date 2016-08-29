<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\Province;
use App\Models\City;

use App\Http\Requests;
use DB;
use Log;

class SearchController extends Controller
{
	protected $filters = array('sort','province','city','model', 'make', 'year', 'condition','body', 'price', 'lat', 'lon','odometer');
	protected $applied_filters = array('province','city','model', 'make', 'year', 'condition','body', 'price', 'odometer');
	protected $url_filters = array('make','model', 'province', 'city', 'body','year');
	protected $post_filters = array('sort','condition', 'price', 'lat', 'lon','odometer');
	protected $url_params;

    public function searchHandler(Request $request, $params=false)
	{
		$conditions = collect();
		$this->sessionToConditions($request, $conditions);
		if($params){
			$param = explode('/', $params);
			foreach ($param as $key => &$value) {
				$value = explode('-', $value, 2);
				$conditions->put($value[0],$value[1]);
			}
		}


		if(!$conditions->get('province'))  // set local area if no province in url
		{
			$data['location'] = getLocation($request);
			$loc = getLocation($request);
			$conditions->put('lat',$loc['lat']);
			$conditions->put('lon',$loc['lon']);
		}

		$this->validateSaveConditions($request, $conditions);
		
		//Sorting set
		if($conditions->get('sort'))
		{
			list($sort,$direction) = explode('-',$conditions->get('sort'));
		}
		else
		{
			$sort = 'created_at';
			$direction = 'desc';
		}
		//$this->getFilterData($conditions);
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

        // $result = Vehicle::applyFilter($conditions)->with(['dealer.province'])->groupBy('province_id')->get();
        // foreach ($result as $key => $value) {
        // 	dd($value);
        // }
        // dd($result->count());
     //    $data['makes'] = City::where('province_id',2)->withCount(['vehicles' => function($query) use ($conditions){
					//     return $query->applyFilter($conditions);
					// }])->having('vehicles_count', '>', 0)->orderBy('city_name', 'asc')->get();
        // dd($data['makes']);
        $data['makes'] = Make::withCount('vehicles')->having('vehicles_count', '>', 0)->orderBy('make_name', 'asc')->get();
        $data['sort'] = $conditions->get('sort');
        $data['vehicles'] = Vehicle::applyFilter($conditions)->orderBy($sort, $direction)->paginate(15);
        $data['featured_vehicles'] = Vehicle::applyFilter($conditions, 1)->orderBy(DB::raw('RAND()'))->take(8)->get();
        $data['applied_filters'] = $this->getAppliedFilters($conditions);
        $data['url_params'] = $params;

		//$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
		
		return view('front.search', $data);
	}

	public function sessionToConditions(Request $request, &$conditions)
	{
		foreach ($request->session()->all() as $key => $value) {
			$conditions->put($key, $request->session()->get($key));
		}
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

	public function removeFilter(Request $request, $params)
	{
		list($filter_raw, $url_params) = explode('|', $params);
		$filter = array_map('trim', explode(':', $filter_raw));  //Explode and trim
		$param_list = explode('/', $url_params);
		$param_array = [];
		if($url_params)
		{
			foreach ($param_list as $key => &$value) {
				$value = explode('-', $value, 2);
				$param_array[$value[0]] = $value[1];
			}
		}

		if(array_key_exists($filter[0],$param_array))
			unset($param_array[$filter[0]]);
		else
			$request->session()->forget($filter[0]);
		$param_list = [];
		foreach ($param_array as $key => $value) {
			array_push($param_list,"$key-$value");
		}
		$param_list = implode("/", $param_list);
		echo $param_list;
	}

	public function getAppliedFilters($conditions)
	{
		foreach ($conditions->all() as $key => $value) {
			if(!in_array($key, $this->applied_filters))
			{
				$conditions->forget($key);
			}
		}
		return $conditions;
	}
	

    public function checkKey($key)  //not used
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
			if(!in_array($key, $this->filters) && $value)
				$conditions->forget($key);
		}
	}

	public function setSessionKeyValue(Request $request, $key, $value)
	{
		$request->session()->put($key,$value);
	}

}


