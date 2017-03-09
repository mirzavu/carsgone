<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Province;
use App\Models\Vehicle;
use App\Models\User;
use App\Mailers\AppMailer;
use SEOMeta;
use Log;

class CreditController extends Controller
{

    public function create(Request $request)
	{

		$data['location'] = getLocation($request);
		SEOMeta::setTitle('Canada Auto Loans | Car Credit and Auto Credit Canada');
        SEOMeta::setDescription('Auto loans in Canada - car credit in Alberta, British Columbia, Manitoba, Ontario, Saskatchewan, New Brunswick, Quebec, Newfoundland and Labrador, Nova Scotia, Prince Edward Island. Apply for auto credit online in Canada.');

		$data['quick_form'] = $request['contact'] == "credit"? false:true;
		$data['provinces'] = Province::orderBy('province_name', 'asc')->pluck('province_name','id');
		return view('front.creditapp', $data);	
	}

	public function send(Request $request, AppMailer $mailer)
	{
		Log::info($request);
		$data = $request;
		$mailer->sendCreditApp($data);
		$request->session()->flash('success', 'Your Credit Application is sent successfully!');
		return response()->json(['status' => 'success']);
	}

	public function quickfinance(Request $request, AppMailer $mailer)
	{	
		$mailer->sendQuickFinanceForm($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}

}
