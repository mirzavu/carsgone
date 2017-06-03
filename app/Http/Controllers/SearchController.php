<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Make;
use App\Models\Province;
use App\Models\City;
use App\Models\VehicleModel;

use App\Http\Requests; 
use DB;
use Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use SEOMeta;
use Illuminate\Pagination\LengthAwarePaginator;


class SearchController extends Controller
{
	protected $filters = array('sort','province','city','model', 'make', 'year', 'condition','body', 'price', 'lat', 'lon', 'place', 'odometer', 'distance', 'transmission', 'content', 'dealer', 'seller');
	protected $applied_filters = array('province','city','model', 'make', 'year', 'condition','body', 'price', 'place', 'odometer', 'distance', 'transmission', 'content', 'dealer', 'seller');
	protected $url_filters = array('make','model', 'province', 'city', 'body', 'seller');
	protected $session_filters = array('year','sort','condition', 'price', 'lat', 'lon', 'place','odometer', 'distance', 'transmission', 'content', 'dealer');
	protected $clear_filters = array('sort','province','city','model', 'make', 'year', 'condition','body', 'price', 'odometer', 'distance', 'transmission', 'content', 'dealer', 'seller');
	protected $dealer_ids;
	protected $url_params;

    public function searchHandler(Request $request, $params=false)
	{
		$conditions = collect();
		$this->sessionToConditions($request, $conditions);
		if($params){
			$param = explode('/', $params);
			foreach ($param as $key => &$value) {
				if (strpos($value, '-') == false) { // If there is no '-'
				    abort(404);
				}
				$value = explode('-', $value, 2);
				$conditions->put($value[0],$value[1]);
			}
		}
		

		if(!$conditions->get('province'))  // set local area if no province in url
		{
			$loc = getLocation($request);
			$conditions->put('lat',$loc['lat']);
			$conditions->put('lon',$loc['lon']);
			$conditions->put('place',$loc['place']);
			$data['location'] = $loc;
		}
		else
		{
			$conditions->forget('place');
		}
		$this->validateSaveConditions($request, $conditions);

		//distance set
		if(empty($loc['place'])){
			$conditions->put('distance','All');
		}

		if(!$conditions->get('distance'))
		{
			$conditions->put('distance','50');
		}

		if($conditions->get('dealer')) 
		{
			$conditions->forget('distance');
			$conditions->forget('province');
		}
		elseif($conditions->get('province'))
		{
			$conditions->forget('distance');
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

		if(Auth::check())
		{
			$conditions->put('user',Auth::user()->id);
		}
		// dd($conditions);
		$title = $this->getTitle($conditions);
		SEOMeta::setTitle(trim($title['title']));
        SEOMeta::setDescription(trim($title['description']));
        SEOMeta::addKeyword(['new cars', 'used cars', 'auto classifieds', 'search cars', 'trucks', 'SUVs', 'vans']);

		// $lat = 53.421879;
  //       $lon = - 113.4675614;
        // A different method - replace whereIn with join for dealers
     //       $ss = Vehicle::join('dealers', 'vehicles.dealer_id', '=', 'dealers.id')
     // ->select(DB::raw("dealers.id"))
     // ->whereRaw("( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) < 200")->paginate(15);
     
		// $this->dealer_ids = Dealer::addSelect(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->havingRaw('distance < '.$conditions->get('distance'))->pluck('id')->toArray();
		//$query = Vehicle::applyFilter($conditions, $dealer_ids)->orderBy($sort, $direction)->take(8)->get();
		//dd($query);

		$data['sidebar_data'] = $this->getSidebarData($conditions);
		

        $data['makes'] = DB::table('makes')
			            ->join('vehicles', 'vehicles.make_id', '=', 'makes.id')
			            ->select('makes.*')
			            ->groupBy('makes.id')
			            ->get();
        $data['sort'] = $sort.'-'.$direction; 
        $data['vehicles'] = Vehicle::applyFilter($conditions)->orderBy('vehicles.'.$sort, $direction)->paginate(15);
        
        $data['featured_vehicles'] = Vehicle::applyFilter($conditions, 1)->orderBy(DB::raw('RAND()'))->take(8)->get();
        $data['applied_filters'] = $this->getAppliedFilters($conditions);
        $data['url_params'] = $params;
        $data['logged_in'] = Auth::check();
        // dd($data);die;
		//$vehicles->select(DB::raw('count(*) as total'))->groupBy('dealer_id');
		
		return view('front.search', $data);
	}

	
	public function getTitle($conditions)
	{
		$loc = '';
		if($conditions->get('province'))
		{
			if($conditions->get('city'))
				$loc = ' in '.$conditions->get('city').", ".$conditions->get('province');
			else
				$loc = ' in '.$conditions->get('province');
		}
		$price = '';
		if($conditions->get('price'))
		{
			$price = ' within range '.$conditions->get('price');
		}
		$title['title'] = $conditions->get('body').' '.$conditions->get('make').' '.$conditions->get('model')." New and Used Cars $price| Buy Sell Vehicles Nearby$loc";
		$title['description'] = $conditions->get('body').' '.$conditions->get('make').' '.$conditions->get('model')." New and used cars. Auto dealers - private for sale by owner buy and sell cars, trucks, SUVs & vans$loc$price";
		return $title;
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
			$sidebar_data['makes'] = Vehicle::ApplyFilter($conditions)
				    ->join('makes', 'vehicles.make_id', '=', 'makes.id')
			            ->selectRaw('count(makes.id) as make_count, makes.make_name')
				    ->groupBy('makes.make_name')
			            ->orderBy('make_count','desc')->get();
		}
		//Get models
		if($conditions->get('make') && !$conditions->get('model'))
		{

			$sidebar_data['models'] = Vehicle::ApplyFilter($conditions)->join('models', 'vehicles.model_id', '=', 'models.id')->selectRaw('count(models.id) as model_count, model_name')->groupBy('models.model_name')->orderBy('model_count','desc')->get();

			// $sidebar_data['models'] = Make::where('make_name',$conditions->get('make'))->first()->models()->withCount(['vehicles' => function($query) use ($conditions){
			// 	return $query->applyFilter($conditions);
			// 	}])->having('vehicles_count', '>', 0)->orderBy('vehicles_count', 'desc')->take(10)->get();

		}


		//Get city
		if($conditions->get('province') && !$conditions->get('city'))
		{
			 $province_id= Province::where('province_name','=',$conditions->get('province'))->value('id');
			 $sidebar_data['cities'] = City::where('province_id','=',$province_id)->withCount('vehicles')->orderBy('city_name', 'asc')->get();
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

			if($key == "distance") // Add all filter for distance
			{	
				if($value != 'All')
				{
					$value = (int)$value. " KM";
				}
				$conditions->put('distance',$value);
			}
		}
		return $conditions;
	}

    public function validateSaveConditions($request, &$conditions)
	{
		foreach ($conditions->all() as $key => $value) {
			if(!in_array($key, $this->filters) || !$value)
				$conditions->forget($key);
		}
	}

	public function setSessionKeyValue(Request $request, $key, $value)
	{
		$request->session()->put($key,$value);
	}

	public function removeSessionAll(Request $request)
	{
		foreach ($this->clear_filters as $value) {
			$request->session()->forget($value);
		}
		
	}

	

}


