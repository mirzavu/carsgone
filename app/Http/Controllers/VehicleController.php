<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Mailers\AppMailer;
use SEOMeta;

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
		$vehicle = Vehicle::with('user')->with('make')->with('model')->where('slug',$slug)->first();

		SEOMeta::setTitle($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' in '.$vehicle->user->city->city_name.','.$vehicle->user->province->province_name);
        SEOMeta::setDescription($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' in '.$vehicle->user->city->city_name.','.$vehicle->user->province->province_name.' for sale in Canada');
        SEOMeta::addKeyword(['new cars', 'used cars', $vehicle->make->make_name, $vehicle->model->model_name, $vehicle->make->make_name.' '.$vehicle->model->model_name]);
		return view('front.brochure', compact('vehicle','location'));
	}

	public function relatedVehicle(Request $request, $slug)
	{

		$vehicle = Vehicle::with('user')->where('slug',$slug)->first();	
		$paid_vehicles = Vehicle::leftJoin('users', 'vehicles.user_id', '=', 'users.id')
								->select('vehicles.*')
								->where(['make_id' => $vehicle->make_id, 'model_id'=>$vehicle->model_id])
								->where(function ($query) {
						    		$query->where('vehicles.featured', '=', 1)
						         		  ->orWhere('users.featured', '=', 1)->take(8);
										})->with('make')->with('model')->with('photos');
		$related = Vehicle::where(['make_id' => $vehicle->make_id, 'model_id'=>$vehicle->model_id])
							->with('make')->with('model')->with('photos')
							->take(8);
		$results = $paid_vehicles->union($related);
		if($vehicle->user->featured)
		{
			$user_vehicles = $vehicle->user->vehicles->take(10);
			$results = $user_vehicles->union($results);
		}
		$results = $results->get();
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
