<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ContentPage;
use App\Mailers\AppMailer;

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

	
	public function contactSend(Request $request, AppMailer $mailer)
	{
		$mailer->sendContactForm($request);
		return response()->json(['status' => 'success', 'message' => 'Your message is sent successfully! You will hear back from us soon.']);
	}

	public function autoloan(Request $request)
	{
		$data['location'] = getLocation($request);
		return view('front.pages.autoloan', $data);
	}


	public function viewLoanPage(Request $request, $slug)
    {
    	$data['location'] = getLocation($request);
    	$data['title'] = ContentPage::where('slug', $slug)->value('title');
    	$data['content'] = ContentPage::where('slug', $slug)->value('content');
    	return view('front.pages.loan_page', $data);
    }

}
