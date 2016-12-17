<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Vehicle;
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
		$vehicle = Vehicle::with('user')->where('slug',$slug)->first();

		SEOMeta::setTitle($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' in '.$vehicle->user->city->city_name.','.$vehicle->user->province->province_name);
        SEOMeta::setDescription($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' in '.$vehicle->user->city->city_name.','.$vehicle->user->province->province_name.' for sale in Canada');
        SEOMeta::addKeyword(['new cars', 'used cars', $vehicle->make->make_name, $vehicle->model->model_name, $vehicle->make->make_name.' '.$vehicle->model->model_name]);

		$related = $vehicle->user->vehicles->take(10);
		return view('front.brochure', compact('vehicle','related','location'));
	}

	public function contactDealer(Request $request)
	{	
		// if(empty($request->dealer_email))
		// {
		// 	return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
		// }
		$mailer->sendDealerContactForm($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}

}
