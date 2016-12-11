<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Province;
use App\Models\User;
use App\Mailers\AppMailer;

class CreditController extends Controller
{

    public function create(Request $request)
	{
		$data['provinces'] = Province::orderBy('province_name', 'asc')->pluck('province_name','id');
		return view('front.creditapp', $data);	
	}

	public function send(Request $request, AppMailer $mailer)
	{
		$data = $request->all();
		$mailer->sendCreditAppTo($data);
		$request->session()->flash('success', 'Your Credit Application is sent successfully!');
		return redirect()->action('CreditController@create');
	}


}
