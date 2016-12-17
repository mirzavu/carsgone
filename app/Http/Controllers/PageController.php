<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\ContentPage;
use App\Models\ContentCarsgone;
use App\Mailers\AppMailer;
use SEOMeta;

class PageController extends Controller
{
    public function help(Request $request)
	{
		SEOMeta::setTitle('Help and FAQs | Carsgone.com');
        SEOMeta::setDescription('Help and Frequently Asked Questions (FAQs) for using the Carsgone.com website as well as help and tips for dealing with common online scams');
		return view('front.pages.help');
	}

	public function privacy(Request $request)
	{
		SEOMeta::setTitle('Privacy Policy | Carsgone.com');
        SEOMeta::setDescription('Sell a private car truck van or SUV Free in Canada. List a vehicle online free or Search new and pre-owned cars, trucks, vans and SUVs from Alberta Auto Dealers and private sellers');
		return view('front.pages.privacy');
	}

	public function contact(Request $request)
	{
		SEOMeta::setTitle('Contact Carsgone.com | Canadian Automotive Classifieds for Trucks, Cars, SUVs and Vans');
        SEOMeta::setDescription('Contact us at Carsgone.com - Canadian automotive classifieds for new &amp; used trucks, cars, SUVs and vans.');
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
		SEOMeta::setTitle('Canada Auto Loans | Car Credit and Auto Credit Canada');
        SEOMeta::setDescription('Auto loans in Canada - car credit in Alberta, British Columbia, Manitoba, Ontario, Saskatchewan, New Brunswick, Quebec, Newfoundland and Labrador, Nova Scotia, Prince Edward Island. Apply for auto credit online in Canada');
		$data['location'] = getLocation($request);
		return view('front.pages.autoloan', $data);
	}


	public function viewLoanPage(Request $request, $slug)
    {
    	$data['location'] = getLocation($request);
    	$page = ContentPage::where('slug', $slug)->first();
    	$data['title'] = $page->title;
    	$data['content'] = $page->content;
    	SEOMeta::setTitle($page->meta_title);
        SEOMeta::setDescription($page->meta_description);
    	return view('front.pages.loan_page', $data);
    }

}
