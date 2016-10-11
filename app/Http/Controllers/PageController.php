<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function help(Request $request)
	{
		return view('front.pages.help');
	}

	public function privacy(Request $request)
	{
		return view('front.pages.privacy');
	}

	public function contact(Request $request)
	{
		$data['location'] = getLocation($request);
		return view('front.pages.contact', $data);
	}

}
