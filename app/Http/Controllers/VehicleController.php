<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Models\Vehicle;
use DB;
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
		$data['location'] = getLocation($request);
		$data['vehicle'] = Vehicle::with('dealer')->where('slug',$slug)->first();
		
		// foreach ($data['vehicle']->photos()->get() as $photo)
		// {
		// 	dd($photo->path);
		// }
		// exit;
		// dd($data['vehicle']->photos()->first());
		// dd($data['vehicle']);
		return view('front.brochure', $data);
	}

}
