<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use App\Models\Province;
use App\Mailers\AppMailer;
use SEO;
use q;
use Log;
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
		$vehicle = Vehicle::with('user')->with('make')->with('model')->where(['slug' => $slug, 'status_id' => 1])->first();
		if(!$vehicle)
		{
			return redirect('/search');
		}
		$provinces = Province::orderBy('province_name', 'asc')->pluck('province_name','id');

		$other_vehicle_text = 'Related Vehicles';
		if(count($vehicle->user) == 0)
		{
			abort(404);
		}
		
		if(empty($vehicle->user->phone))
			$phone = false;
		else
			$phone = $vehicle->user->phone;

		if($vehicle->user->featured)
			$other_vehicle_text = 'Dealers Other Vehicles';
		else
			$other_vehicle_text = 'Related Vehicles';
		$discount = $this->getDiscount($vehicle);
		SEO::setTitle($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' '.($vehicle->trim?: "").' in Edmonton, Alberta '.$vehicle->price);
        SEO::setDescription($vehicle->year.' '.$vehicle->make->make_name.' '.$vehicle->model->model_name.' '.($vehicle->trim?: "").' $'.$vehicle->price.' in Edmonton, Alberta for $'.$vehicle->price.'. Check out this '.($vehicle->ext_color?$vehicle->ext_color->color: "").' '.($vehicle->bodyStyleGroup?$vehicle->bodyStyleGroup->body_style_group_name: "").' with '.($vehicle->odometer?: "").' kilometers on it for sale from '.($vehicle->user->name?: ""));
        SEOMeta::addKeyword(['new cars', 'used cars', $vehicle->make->make_name, $vehicle->model->model_name, $vehicle->make->make_name.' '.$vehicle->model->model_name]);
        SEO::opengraph()->setUrl($request->url());
        SEO::opengraph()->addProperty('type', 'product');
        SEO::opengraph()->addImage($vehicle->photo());
		return view('front.brochure', compact('vehicle','location','other_vehicle_text','provinces', 'discount', 'phone'));
	}

	public function relatedVehicle(Request $request, $slug)
	{

		$vehicle = Vehicle::with('user')->where('slug',$slug)->first();	
		/*$paid_vehicles = Vehicle::leftJoin('users', 'vehicles.user_id', '=', 'users.id')
								->select('vehicles.*')
								->where(['make_id' => $vehicle->make_id])
								->where(function ($query) {
						    		$query->where('vehicles.featured', '=', 1)
						         		  ->orWhere('users.featured', '=', 1)->take(8);
										})->with('make')->with('model')->with('photos')->get();*/
		// dd($paid_vehicles);
		$related = Vehicle::where(['make_id' => $vehicle->make_id, 'model_id'=>$vehicle->model_id])
							->with('make')->with('model')->with('photos')
							->take(8)->get();
		if($related->count() < 6)
		{
			$related_makes = Vehicle::where(['make_id' => $vehicle->make_id])
							->with('make')->with('model')->with('photos')
							->take(8)->get();
			$related = $related->merge($related_makes);
			if($related->count() < 6)
			{
				$related_styles = Vehicle::where(['body_style_group_id' => $vehicle->body_style_group_id])
							->with('make')->with('model')->with('photos')
							->take(8)->get();
				$related = $related->merge($related_styles);
			}
		}
		$related = $related->except($vehicle->id);
		$related->splice(11); //take 10 in total
		// dd($related);
		return $related->toJson();
	}

	public function getDiscount($vehicle) {
		$price = str_replace(array('$', ','),"",$vehicle->price);
		$mrp = str_replace(array('$', ','),"",$vehicle->mrp);
		$price = $price == 'Contact'? 0:(int)$price;
		$mrp = $mrp? (int)$mrp:0;
		return $price-$mrp;
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

	public function carproofRequest(Request $request, AppMailer $mailer)
	{	
		$mailer->sendCarproofRequest($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}


	public function finance(Request $request, AppMailer $mailer)
	{	
		$vehicle = Vehicle::whereslug($request['vehicle'])->first();
		$mailer->sendDealerFinanceForm($request, $vehicle);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}


	public function resendVehicleEmail(Request $request, AppMailer $mailer)
	{
		$vehicle = Vehicle::whereSlug($request->vehicle)->first();
		$user = $vehicle->user;
		$mailer->sendVehicleConfirmation($user, $vehicle);
		return response()->json(['status' => 'success', 'message' => 'Links to edit the vehicle is sent to your email address.']);
	}

	

}
