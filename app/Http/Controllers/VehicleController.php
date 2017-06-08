<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\Province;
use App\Mailers\AppMailer;
use SEO;
use SEOMeta;
use Log;

class VehicleController extends Controller
{

	/**
	 * Display the home page.
	 *
	 * @return Response
	 */

	public function __construct()
    {
        //$this->middleware('auth');
    }

	public function showVehicle(Request $request, $slug)
	{	

		$location = getLocation($request);
		$vehicle = Vehicle::with('user')->with('make')->with('model')->where('slug',$slug)->firstOrFail();
		$provinces = Province::orderBy('province_name', 'asc')->pluck('province_name','id');

		$other_vehicle_text = 'Related Vehicles';
		if($vehicle->user->featured)
			$other_vehicle_text = 'Dealers Other Vehicles';
		else
			$other_vehicle_text = 'Related Vehicles';
		SEO::setTitle($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' in '.($vehicle->user->city->city_name?? "").', '.($vehicle->user->province->province_name?? "").', $'.$vehicle->price);
        SEO::setDescription($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' '.($vehicle->trim?? "").' $'.$vehicle->price.' in '.($vehicle->user->city->city_name?? "").', '.($vehicle->user->province->province_name?? "").' for $'.$vehicle->price.'. Check out this '.($vehicle->ext_color->color?? "").' '.($vehicle->bodyStyleGroup->body_style_group_name?? "").' with '.($vehicle->odometer?? "").' kilometers on it for sale from '.($vehicle->user->name?? ""));
        SEOMeta::addKeyword(['new cars', 'used cars', $vehicle->make->make_name, $vehicle->model->model_name, $vehicle->make->make_name.' '.$vehicle->model->model_name]);
        SEO::opengraph()->setUrl($request->url());
        SEO::opengraph()->addProperty('type', 'product');
        SEO::opengraph()->addImage($vehicle->photo());
		return view('front.brochure', compact('vehicle','location','other_vehicle_text','provinces'));
	}

	public function relatedVehicle(Request $request, $slug)
	{

		$vehicle = Vehicle::with('user')->where('slug',$slug)->first();	
		$paid_vehicles = Vehicle::leftJoin('users', 'vehicles.user_id', '=', 'users.id')
								->select('vehicles.*')
								->where(['make_id' => $vehicle->make_id])
								->where(function ($query) {
						    		$query->where('vehicles.featured', '=', 1)
						         		  ->orWhere('users.featured', '=', 1)->take(8);
										})->with('make')->with('model')->with('photos')->get();
		// dd($paid_vehicles);
		$related = Vehicle::where(['make_id' => $vehicle->make_id, 'model_id'=>$vehicle->model_id])
							->with('make')->with('model')->with('photos')
							->take(8)->get();
		$results = $paid_vehicles->merge($related);
		if($vehicle->user->featured)
		{
			$user_vehicles = Vehicle::where('user_id',$vehicle->user->id)->with('make')->with('model')->with('photos')->take(10)->get();
			// dd($user_vehicles)
			$results = $user_vehicles->merge($results);
		}
		// $results3 = $results2->get();
		$results->splice(10); //take 10 in total
		return $results->toJson();
	}

	public function contactDealer(Request $request, AppMailer $mailer)
	{	
		// if(empty($request->dealer_email))
		// {
		// 	return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
		// }
		$mailer->sendDealerContactForm($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}

	public function finance(Request $request, AppMailer $mailer)
	{	
		$vehicle = Vehicle::whereslug($request['vehicle'])->first();
		$mailer->sendDealerFinanceForm($request, $vehicle);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}

	public function makeOffer(Request $request, AppMailer $mailer)
	{
		$mailer->sendOffer($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}
	
	public function tradeVehicleForm(Request $request, AppMailer $mailer)
	{
		$mailer->sendtradeVehicleForm($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}

}
