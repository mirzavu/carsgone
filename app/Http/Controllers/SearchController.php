<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\Province;
use App\Models\City;
use App\Models\Dealer;
use App\Models\VehicleModel;

use App\Http\Requests; 
use DB;
use Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
class SearchController extends Controller
{
	protected $filters = array('sort','province','city','model', 'make', 'year', 'condition','body', 'price', 'lat', 'lon','odometer', 'distance', 'transmission', 'content');
	protected $applied_filters = array('province','city','model', 'make', 'year', 'condition','body', 'price', 'odometer', 'distance', 'transmission', 'content');
	protected $url_filters = array('make','model', 'province', 'city', 'body');
	protected $session_filters = array('year','sort','condition', 'price', 'lat', 'lon','odometer', 'distance', 'transmission', 'content');
	protected $dealer_ids;
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

		//distance set
		if(!$conditions->get('distance'))
		{
			$conditions->put('distance','200');
		}
		
		//Sorting set
		if($conditions->get('sort') && $conditions->get('sort')!="name-desc")
		{
			list($sort,$direction) = explode('-',$conditions->get('sort'));
		}
		else
		{
			$sort = 'created_at';
			$direction = 'desc';
		}

		$lat = 53.421879;
        $lon = - 113.4675614;
        // A different method - replace whereIn with join for dealers
        //    $ss = Vehicle::join('dealers', 'vehicles.dealer_id', '=', 'dealers.id')
     // ->select(DB::raw("dealers.id"))
     // ->whereRaw("( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) < 200")->paginate(15);
     // dd($ss);exit;
		$this->dealer_ids = Dealer::addSelect(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->havingRaw('distance < '.$conditions->get('distance'))->pluck('id')->toArray();
		//$query = Vehicle::applyFilter($conditions, $dealer_ids)->orderBy($sort, $direction)->take(8)->get();
		//dd($query);

		$data['sidebar_data'] = $this->getSidebarData($conditions);


        $data['makes'] = DB::table('makes')
			            ->join('vehicles', 'vehicles.make_id', '=', 'makes.id')
			            ->select('makes.*')
			            ->groupBy('makes.id')
			            ->get();
        $data['sort'] = $sort.'-'.$direction; 
        $data['vehicles'] = Vehicle::applyFilter($conditions, $this->dealer_ids)->orderBy($sort, $direction)->paginate(15);
        // dd($data['vehicles']);
  		// foreach ($data['vehicles'] as $key => $value) {
  		// 	echo $value->id;
  		// 	//echo $value->photo();echo "<br>";
  		// }
  		// exit;

        $data['featured_vehicles'] = Vehicle::applyFilter($conditions, $this->dealer_ids, 1)->orderBy(DB::raw('RAND()'))->take(8)->get();
        $data['applied_filters'] = $this->getAppliedFilters($conditions, $this->dealer_ids);

        $data['url_params'] = $params;
        // dd($data);die;
		//$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
		
		return view('front.search', $data);
	}

	public function sessionToConditions(Request $request, &$conditions)
	{
		foreach ($request->session()->all() as $key => $value) {
			$conditions->put($key, $request->session()->get($key));
		}
	}

	public function getSidebarData($conditions)
	{
		//Get makes
		$sidebar_data = [];
		if(!$conditions->get('make'))
		{
			//$sidebar_data['makes'] = Vehicle::ApplyFilter($conditions, $this->dealer_ids)->selectRaw('count(makes.id) as make_count, make_name')->groupBy('makes.make_name')->orderBy('make_count','desc')->get();
			$sidebar_data['makes'] = Vehicle::ApplyFilter($conditions, $this->dealer_ids)
				    ->join('makes', 'vehicles.make_id', '=', 'makes.id')
			            ->selectRaw('count(makes.id) as make_count, makes.make_name')
				    ->groupBy('makes.make_name')
			            ->orderBy('make_count','desc')->get();
		}
		//Get models
		if($conditions->get('make') && !$conditions->get('model'))
		{

			$sidebar_data['models'] = Vehicle::ApplyFilter($conditions, $this->dealer_ids)->join('models', 'vehicles.model_id', '=', 'models.id')->selectRaw('count(models.id) as model_count, model_name')->groupBy('models.model_name')->orderBy('model_count','desc')->get();

			// $sidebar_data['models'] = Make::where('make_name',$conditions->get('make'))->first()->models()->withCount(['vehicles' => function($query) use ($conditions){
			// 	return $query->applyFilter($conditions);
			// 	}])->having('vehicles_count', '>', 0)->orderBy('vehicles_count', 'desc')->take(10)->get();

		}


		//Get city
		if($conditions->get('province') && !$conditions->get('city'))
		{
			$ss = Vehicle::ApplyFilter($conditions)
					->with(['dealer.province' => function($query) {
					    return $query->groupBy('province_name');
					}])->get();
			$ss = Province::where('province_name','=','Manitoba')->first()->cities()->withCount(['vehicles' => function ($query) use ($conditions) {
					    $query->applyFilter($conditions);

					}])->get();
			foreach ($ss as $value) {
				// dd($value);
			}
		}
		return $sidebar_data;
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


