<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dealer;
use App\Http\Requests;

class DealerController extends Controller
{
	protected $filters = array('sort','province','city','name','postal_code');
	protected $applied_filters = array('province','city','name','postal_code');

    public function info(Request $request)
	{
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
				$value = explode('-', $value, 2);
				$conditions->put($value[0],$value[1]);
			}
		}

		//Sorting set
		if($conditions->get('sort'))
		{
			list($sort,$direction) = explode('-',$conditions->get('sort'));
		}
		else
		{
			$sort = 'name';
			$direction = 'asc';
		}

		$data['sidebar_data'] = $this->getSidebarData($conditions);
		$data['sort'] = $sort.'-'.$direction; 
		$data['dealers'] = Dealer::applyFilter($conditions)->orderBy($sort, $direction)->paginate(15);
		$data['applied_filters'] = $this->getAppliedFilters($conditions);
		$data['url_params'] = $params;
		// $data['filters'] = $this->filters;
		return view('front.dealer.listing', $data);
	}

	public function showDealer(Request $request, $slug)
	{	
		$data['location'] = getLocation($request);
		$data['dealer'] = Dealer::where('slug',$slug)->first();
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
			$sidebar_data['provinces'] = Dealer::ApplyFilter($conditions)
				    ->join('provinces', 'dealers.province_id', '=', 'provinces.id')
			            ->selectRaw('count(provinces.id) as province_count, provinces.province_name')
				    ->groupBy('provinces.province_name')
			            ->orderBy('province_count','desc')->get();
		}
		//Get models
		if($conditions->get('province') && !$conditions->get('city'))
		{

			$sidebar_data['cities'] = Dealer::ApplyFilter($conditions)->join('cities', 'dealers.city_id', '=', 'cities.id')->selectRaw('count(cities.id) as city_count, city_name')->groupBy('cities.city_name')->orderBy('city_count','desc')->get();
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
