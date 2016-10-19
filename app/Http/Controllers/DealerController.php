<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DealerController extends Controller
{
    public function info(Request $request)
	{
		$data['location'] = getLocation($request);
		return view('front.dealer.info', $data);
	}
}
