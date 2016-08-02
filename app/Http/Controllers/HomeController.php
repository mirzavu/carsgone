<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\Make;
use App\Models\BodyStyleGroup;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */
	public function index()
	{
		$total = Vehicle::active()->count();
		$provinces = Province::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('province_name', 'asc')->get();

		$makes = Make::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('make_name', 'asc')->get();

		$body_style_groups = BodyStyleGroup::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('body_style_group_name', 'asc')->get();

		foreach ($provinces as $province) {
		    echo $province->province_name." ".$province->vehicles_count." \n";
		}
		exit;

		$count = Vehicle::where('status_id', 1)->count();
		$phone = User::find(1)->role;
		var_dump('1');exit;
		return view('front.index');
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
