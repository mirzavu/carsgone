<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicle;
use App\Http\Requests;
use SEOMeta;
use App\Models\ContentPage;

class DealerController extends Controller
{
	protected $filters = array('dealer_sort','province','city','name','postal_code');
	protected $applied_filters = array('province','city','name','postal_code');

    public function info(Request $request)
	{
		SEOMeta::setTitle('Auto Dealers Online Advertising | Car and Truck Dealership Marketing and Internet Sales Websites');
        SEOMeta::setDescription('Dealership advertising and marketing website, and automotive sales. Dealers car and truck free posting service');
        $data['dealer_info'] = ContentPage::where('slug', 'dealer-info')->firstOrFail()->content;
        $data['free_membership'] = ContentPage::where('slug', 'free-membership')->first()->content;
        $data['premium_account'] = ContentPage::where('slug', 'premium-account')->first()->content;
        $data['vehicle_count'] =  Vehicle::where('status_id', 1)->count();
        $data['dealer_count'] =  User::where('role', 'dealer')->count();
		$data['location'] = getLocation($request);
		return view('front.dealer.info', $data);
	}

	public function listing(Request $request, $params=false)
	{

		$data['location'] = getLocation($request);
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

		//Sorting set
		if($conditions->get('dealer_sort'))
		{
			list($dealer_sort,$direction) = explode('-',$conditions->get('dealer_sort'));
		}
		else
		{
			$dealer_sort = 'name';
			$direction = 'asc';
		}

		$title = $this->getTitle($conditions);
		SEOMeta::setTitle($title['title']);
        SEOMeta::setDescription($title['description']);

		$data['sidebar_data'] = $this->getSidebarData($conditions);
		$data['dealer_sort'] = $dealer_sort.'-'.$direction; 
		$data['dealers'] = User::applyFilter($conditions)
							->withCount(['vehicles' => function ($query) {
    							$query->where('status_id',1);
								}])
							->orderBy($dealer_sort, $direction)
							->paginate(15);
		$data['applied_filters'] = $this->getAppliedFilters($conditions);
		$data['url_params'] = $params;
		// $data['filters'] = $this->filters;
		return view('front.dealer.listing', $data);
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
		$title['title'] = "Auto and Truck Dealers - Find New and Used Car Dealerships$loc";
		$title['description'] = "New and used cars. Auto dealers - private for sale by owner buy and sell cars, trucks, SUVs & vans$loc";
		return $title;
	}

	public function showDealer(Request $request, $slug)
	{	

		$data['location'] = getLocation($request);
		$data['dealer'] = User::where('slug',$slug)->firstOrFail();
		SEOMeta::setTitle($data['dealer']->name." in ".$data['dealer']->city->city_name.", ".$data['dealer']->province->province_name);

        SEOMeta::setDescription($data['dealer']->name." in ".$data['dealer']->city->city_name.", ".$data['dealer']->province->province_name." is a car dealership selling cars, trucks, vans and SUVs. You can also apply for ".$data['dealer']->city->city_name.", ".$data['dealer']->province->province_name." auto loans.");	
		$data['recent'] = Vehicle::where('user_id',$data['dealer']->id)->orderBy('created_at', 'desc')->take(6)->get();
		
		$data['makes'] = Vehicle::where('user_id',$data['dealer']->id)->where('status_id', 1)->join('makes', 'vehicles.make_id', '=', 'makes.id')
			            ->selectRaw('count(makes.id) as make_count, makes.make_name')
				    	->groupBy('makes.make_name')
			            ->orderBy('make_count','desc')->get();
		$data['body'] = Vehicle::where('user_id',$data['dealer']->id)->where('status_id', 1)->join('body_style_groups', 'vehicles.body_style_group_id', '=', 'body_style_groups.id')
			            ->selectRaw('count(body_style_groups.id) as body_count, body_style_groups.body_style_group_name')
				    	->groupBy('body_style_groups.body_style_group_name')
			            ->orderBy('body_count','desc')->get();
		$data['years'] = Vehicle::where('user_id',$data['dealer']->id)
						->where('status_id', 1)
						->selectRaw('count(year) as year_count, year')
						->groupBy('year')
						->orderBy('year_count','desc')->get();
		$data['prices'] = Vehicle::where('user_id',$data['dealer']->id)
						->where('status_id', 1)
						->selectRaw('concat(5000*floor(price/5000),"-",5000*floor(price/5000) + 5000) as `range`,count(*) as `count`')
						->groupBy('range')->get();

		   // dd($data['years']);
		return view('front.dealer.show', $data);
	}

	public function validateSaveConditions($request, &$conditions)
	{
		foreach ($conditions->all() as $key => $value) {
			if(!in_array($key, $this->filters) && $value)
				$conditions->forget($key);
		}
	}

	public function getSidebarData($conditions)
	{
		//Get makes
		$sidebar_data = [];
		if(!$conditions->get('province'))
		{
			//$sidebar_data['makes'] = Vehicle::ApplyFilter($conditions, $this->dealer_ids)->selectRaw('count(makes.id) as make_count, make_name')->groupBy('makes.make_name')->orderBy('make_count','desc')->get();
			$sidebar_data['provinces'] = User::ApplyFilter($conditions)
				    ->join('provinces', 'users.province_id', '=', 'provinces.id')
			            ->selectRaw('count(provinces.id) as province_count, provinces.province_name')
				    ->groupBy('provinces.province_name')
			            ->orderBy('province_name','asc')->get();
		}
		//Get models
		if($conditions->get('province') && !$conditions->get('city'))
		{

			$sidebar_data['cities'] = User::ApplyFilter($conditions)->join('cities', 'users.city_id', '=', 'cities.id')->selectRaw('count(cities.id) as city_count, city_name')->groupBy('cities.city_name')->orderBy('city_count','desc')->get();
		}
		return $sidebar_data;
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

	public function sessionToConditions(Request $request, &$conditions)
	{
		foreach ($request->session()->all() as $key => $value) {
			$conditions->put($key, $request->session()->get($key));
		}
	}
}
