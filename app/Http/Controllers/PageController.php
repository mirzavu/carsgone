<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function help()
	{
		return view('front.pages.help');
	}

	public function privacy()
	{
		return view('front.pages.privacy');
	}

	public function contact()
	{
		return view('front.pages.contact');
	}

}
