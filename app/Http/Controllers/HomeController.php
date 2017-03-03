<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\City;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\BodyStyleGroup;
use App\Models\Color;
use App\Models\VehiclePhoto;
use App\Models\Option;
use App\Models\BodyStyle;
use App\Models\DriveType;
use App\Models\FuelType;
use App\Models\TransmissionType;
use SEOMeta;
use DB;
use Log;

use Cache;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */

	protected $sessions = array('_token','place','lat','lon', '_previous', 'flash');

	public function __construct()
    {
        //$this->middleware('auth');
    }

	public function index(Request $request)
	{	
		SEOMeta::setTitle('Used Cars and Auto Loans Canada | Free Auto Classifieds | Buy Sell and Trade at Carsgone.com');
        SEOMeta::setDescription('Providing an online solution for buying and selling New and Used cars, trucks, vans and SUVs.  Free auto classifieds for private sellers and dealerships at Carsgone.com');
        SEOMeta::addKeyword(['new cars', 'used cars', 'auto classifieds', 'auto loans Canada', 'trucks', 'SUVs', 'vans']);

        //Clear search page filters
        foreach ($request->session()->all() as $key => $value) {
        	if(!in_array($key, $this->sessions))
        	{
        		$request->session()->forget($key);
        	}
        }

		$data['total'] = Vehicle::count();
		$data['location'] = getLocation($request);
		$data['provinces'] = Cache::remember('home_provinces', 30, function() {
				    return Province::withCount('vehicles')->orderBy('province_name', 'asc')->get();
				});
		$data['makes'] = Cache::remember('home_makes', 30, function() {
				    return Make::withCount('vehicles')->having('vehicles_count', '>', 0)->orderBy('make_name', 'asc')->get();
				});

		$data['body_style_groups'] = Cache::remember('home_body_style_groups', 30, function() {
				    return BodyStyleGroup::withCount('vehicles')->orderBy('body_style_group_name', 'asc')->get();
				});


		$prices = Cache::remember('home_prices', 30, function() {
				    return DB::table('vehicles')->select(DB::raw('concat(5000*floor(price/5000),"-",5000*floor(price/5000) + 5000) as `range`,count(*) as `count`'))->groupBy('range')->orderBy('price', 'asc')->get();
				});

		// $data['provinces'] = Cache::remember('provinces', 30, function() {
		//     return Province::withCount('vehicles')->orderBy('province_name', 'asc')->get();
		// });

		// $data['makes'] = Cache::remember('makes', 30, function() {
		//     return Make::withCount('vehicles')->having('vehicles_count', '>', 0)->orderBy('make_name', 'asc')->get();
		// });

		// $data['body_style_groups'] = BodyStyleGroup::withCount('vehicles')->orderBy('body_style_group_name', 'asc')->get();

		// $prices = Cache::remember('prices', 30, function() {
		//     return DB::table('vehicles')->select(DB::raw('concat(5000*floor(price/5000),"-",5000*floor(price/5000) + 5000) as `range`,count(*) as `count`'))->groupBy('range')->get();
		// });
		
		$data['prices'] = $this->format_price_range($prices);
		$data['count'] = Vehicle::where('status_id', 1)->count();
		return view('front.home', $data);
	}

	public function format_price_range(&$prices)
	{
		foreach ($prices as &$price) 
		{
			$range = explode('-', $price->range);
			$range[0] = '$'.$range[0];
			$range[1] = '$'.$range[1];
			$price->formatrange = join(" - ", $range);
		}
		return $prices;
	}

	public function searchTerm(Request $request)
	{

		$terms = explode(" ",$request->search_text);
		Log::info($terms);
		$flags = array('make' => 0,'model' =>0, 'province'=>0, 'city'=>0 );
		$search_param ='';
		foreach ($terms as $key => $keyword) {
			if(Make::where('make_name',"LIKE","%$keyword%")->count() && $flags['make']==0)
			{
				$param = Make::where('make_name',"LIKE","%$keyword%")->first();
				unset($terms[$key]);
				$search_param .= "make-".$param->make_name."/";
				$flags['make']=1;
			}
			elseif (Province::where('province_name',"=","$keyword")->count()  && $flags['province']==0) 
			{	
				$param = Province::where('province_name',"=","$keyword")->first();
				$search_param .= "province-".$param->province_name."/";
				unset($terms[$key]);
				$flags['province']=1;
			}
			elseif (VehicleModel::where('model_name',"=","$keyword")->count()  && $flags['model']==0) 
			{	
				$param = VehicleModel::where('model_name',"=","$keyword")->first();
				$search_param .= "make-".$param->make()->first()->make_name."/model-".$param->model_name."/";
				unset($terms[$key]);
				$flags['model']=1;
			}
		}
		if(count($terms))
		{
			$content_param = implode(" ", $terms);
			$request->session()->put('content',$content_param);
		}
		return response()->json(['status' => 'success', 'link' => $search_param]);
	}

	public function getModels($make_id)
	{
		$models = VehicleModel::where('make_id',"=",$make_id)->get();
		echo json_encode($models);
	}

}
