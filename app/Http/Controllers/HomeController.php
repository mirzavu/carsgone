<?php

namespace App\Http\Controllers;

use App\Jobs\ChangeLocale;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\Dealer;
use App\Models\Province;
use App\Models\Make;
use App\Models\VehicleModel;
use App\Models\BodyStyleGroup;
use DB;
use Log;

class HomeController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        $this->middleware('auth');
    }

	public function index(Request $request)
	{	
		$data['location'] = getLocation($request);
		//$provinces = Province::find(1)->vehicles;
		$data['total'] = Vehicle::active()->count();
		$data['provinces'] = Province::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('province_name', 'asc')->get();
		// dd($data['provinces'][0]);
		// $data['provinces'] = Province::where('id','>',5)->withCount(['vehicles' => function($query) {
		//     $query->active();
		// }]);
		// $data['provinces']->having('vehicles_count', '>', 0)->orderBy('province_name', 'asc')->get();
		$data['makes'] = Make::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->having('vehicles_count', '>', 0)->orderBy('make_name', 'asc')->get();

		$data['body_style_groups'] = BodyStyleGroup::withCount(['vehicles' => function($query) {
		    $query->active();
		}])->orderBy('body_style_group_name', 'asc')->get();
		//dd($data['body_style_groups']);

		$prices = DB::table('vehicles')->select(DB::raw('concat(5000*floor(price/5000),"-",5000*floor(price/5000) + 5000) as `range`,count(*) as `count`'))->groupBy('range')->get();

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
			$price->range = join(" - ", $range);
		}
		return $prices;
	}

		

	public function searchTerm($term)
	{
		$terms = explode(" ",$term);
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
		}
		if(count($terms))
		{
			$content_param = implode(" ", $terms);
			$search_param.= "content-".$content_param;
		}
		echo $search_param;exit;
	}

	public function getModels($make_id)
	{
		$models = VehicleModel::where('make_id',"=",$make_id);
		Log::info('Showing user profile for user: '.json_encode($models));
		echo json_encode($models);
	}

}
