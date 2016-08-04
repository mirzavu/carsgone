<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\Make;
use App\Models\BodyStyleGroup;
use DB;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provinces = Province::find(1)->vehicles;
		$data['total'] = Vehicle::active()->count();
		$data['provinces'] = Province::where('id','>',5)->withCount(['vehicles' => function($query) {
		    $query->active();
		}])->having('vehicles_count', '>', 0)->orderBy('province_name', 'asc')->get();

		$data['makes'] = Make::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('make_name', 'asc')->get();

		$data['body_style_groups'] = BodyStyleGroup::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('body_style_group_name', 'asc')->get();

		$data['prices'] = DB::table('vehicles')->select(DB::raw('concat(300*floor(price/300),"-",300*floor(price/300) + 300) as `range`,count(*) as `count`'))->groupBy('range')->get();
		//var_dump($prices);
		foreach ($data['prices'] as $price) {
			//dd($price);
		    echo $price->range." ";
		}
		
		$count = Vehicle::where('status_id', 1)->count();
		$phone = User::find(1)->role;
		return view('front.index', $data);
	}

	public function searchterm($term)
	{
		$terms = explode(" ",$term);
		$flags = array('make' => 0,'model' =>0, 'province'=>0, 'city'=>0 );
		foreach ($terms as $key) {
			$make = Make::where('make_name','=',$key)-count();
			if(Make::where('make_name','=',$key)-count() && $flags['make']==0)
			{
				$searchparam += "make-".$key;
			}
			elseif (Province::where('province_name','=',$key)-count()  && $flags['province']==0) 
			{
				$searchparam += "province-".$key;
			}

		}
		return Response::json($searchparam);
	}

	/**
	 * Change language.
	 *
	 * @param  App\Jobs\ChangeLocaleCommand $changeLocale
	 * @param  String $lang
	 * @return Response
	 */
	public function language( $lang,
		ChangeLocale $changeLocale)
	{		
		$lang = in_array($lang, config('app.languages')) ? $lang : config('app.fallback_locale');
		$changeLocale->lang = $lang;
		$this->dispatch($changeLocale);

		return redirect()->back();
	}

}
