<?php

namespace App\Http\Controllers;
use Validator;
use Paypal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Models\Make;
use App\Models\BodyStyleGroup;
use App\Models\Vehicle;
use App\Models\Color;
use App\Models\VehicleModel;
use App\Models\VehiclePhoto;
use App\Models\DriveType;
use App\Models\FuelType;
use Barryvdh\Debugbar\Facade as Debugbar;
use File;
use Log;

class PostController extends Controller
{
	private $_apiContext;
	protected $upload_path;

	public function __construct()
	{
		$this->upload_path = public_path() . '/uploads/vehicle'; 
		$this->_apiContext = PayPal::ApiContext(
            config('services.paypal.client_id'),
            config('services.paypal.secret'));

        $this->_apiContext->setConfig(array(
            'mode' => 'sandbox',
            'service.EndPoint' => 'https://api.sandbox.paypal.com',
            'http.ConnectionTimeOut' => 300,
            'log.LogEnabled' => true,
            'log.FileName' => storage_path('logs/paypal.log'),
            'log.LogLevel' => 'FINE'
        ));
	}
    

    public function newPost(Request $request)
	{	
		
		// echo "<pre>";print_r(curl_version());exit;
		// $a = Paypal::getAll(array('count' => 1, 'start_index' => 0), $this->_apiContext);
		// dd($a);
		$data['location'] = getLocation($request);
		$data['makes'] = Make::all();
		$data['body_style_groups'] = BodyStyleGroup::all();
		return view('front.post.post', $data);
	}

	public function create(Request $request)
	{		
		$request['model_id'] = VehicleModel::where('model_name', $request['model'])->value('id');
		if(!empty($request['colour_exterior'])) $request['ext_color_id'] = Color::where('color', $request['colour_exterior'])->value('id');
		if(!empty($request['colour_interior'])) $request['int_color_id'] = Color::where('color', $request['colour_interior'])->value('id');
		if(!empty($request['fuel'])) $request['fuel_id'] = FuelType::where('fuel_type', $request['fuel'])->value('id');
		//$request['status_id'] = 1;
		// Log::info($request->all());
		$validator = Validator::make($request->all(), [
            'make_id' => 'required|integer',
            'model_id' => 'required|integer',
            'year' => 'required|min:1970|max:2020|integer'
        ]);

        if ($validator->fails()) {
        	return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }
        Log::info($request->all());
		$vehicle = Auth::user()->vehicles()->create($request->all());
		$vehicle->slug = null;
		$vehicle->save();
		$image_names = explode('^', $request['file_names']);
		
		$photos =[];$i=0;
		foreach($image_names as $image) {
			if(!empty($image))
            	array_push($photos, new VehiclePhoto(['position' => $i++, 'path' => 'uploads/vehicle/'.$image]));
        }
        $vehicle->photos()->saveMany($photos);

		if ($request->has('free')) {
			if(Auth::user()->verified)
			{
				$request->session()->flash('success', 'Vehicle has been posted Successfully! Check <a href="/dashboard">Dashboard</a>');
			}
			else
			{
				$request->session()->flash('success', 'Vehicle has been posted Successfully! Verify your email address to publish your vehicle');
			}
		 	return response()->json(['status' => 'done', 'url' => url('post')]);
		}
		else
		{
			$payer = PayPal::Payer();
		    $payer->setPaymentMethod('paypal');

		    $amount = PayPal::Amount();
		    $amount->setCurrency('CAD');
		    $amount->setTotal(14.95); // This is the simple way,
		    // you can alternatively describe everything in the order separately;
		    // Reference the PayPal PHP REST SDK for details.

		    $item = PayPal::Item();                            
			$item->setQuantity(1);                         
			$item->setName('Promote your vehicle');           
			$item->setPrice(14.95);               
			$item->setCurrency('CAD');          

			$itemList = PayPal::ItemList();                    
			$itemList->setItems(array($item));

		    $transaction = PayPal::Transaction();
		    $transaction->setAmount($amount);
		    $transaction->setItemList($itemList);
		    $transaction->setDescription('Selling of new and used cars in Canada');

		    $redirectUrls = PayPal::RedirectUrls();
		    $redirectUrls->setReturnUrl(action('PostController@getDone').'?vehicle_id=1234');
		    $redirectUrls->setCancelUrl(action('PostController@newPost'));

		    $payment = PayPal::Payment();
		    $payment->setIntent('sale');
		    $payment->setPayer($payer);
		    $payment->setRedirectUrls($redirectUrls);
		    $payment->setTransactions(array($transaction));
		    $payment->setExperienceProfileId($this->createWebProfile());

		    // $input = Paypal::InputFields();
		    // $input->setNoShipping(1);

		    $response = $payment->create($this->_apiContext);



		    $redirectUrl = $response->links[1]->href;

		    return response()->json(['status' => 'paypal', 'url' => $redirectUrl]);
		}
	}

	public function getDone(Request $request)
	{
	    $id = $request->get('paymentId');
	    $token = $request->get('token');
	    $payer_id = $request->get('PayerID');
	    $vehicle_id = $request->get('vehicle_id');
	    $uer_id = Auth::user()->id;
	    $payment = PayPal::getById($id, $this->_apiContext);

	    $paymentExecution = PayPal::PaymentExecution();

	    $paymentExecution->setPayerId($payer_id);
	    $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
	    dd($executePayment->id);
	    Payment::create(['user_id' => $user_id, 'vehicle_id' => $vehicle_id, 'payment_id' => $executePayment->id, 'status' => $executePayment->status ]);
	    $request->session()->flash('success', 'Vehicle has been posted Successfully!');
	    // dd($executePayment);

	    // Clear the shopping cart, write to database, send notifications, etc.

	    // Thank the user for the purchase
	    return view('front.post.post');
	}

	public function createWebProfile()
	{
	    $flowConfig = PayPal::FlowConfig();
	    $presentation = PayPal::Presentation();
	    $inputFields = PayPal::InputFields();
	    $webProfile = PayPal::WebProfile();
	    $flowConfig->setLandingPageType("Billing"); //Set the page type

	    $presentation->setLogoImage("http://128.199.210.209/assets/images/logo.png")->setBrandName("Carsgone ltd"); //NB: Paypal recommended to use https for the logo's address and the size set to 190x60.

	    $inputFields->setAllowNote(true)->setNoShipping(1)->setAddressOverride(0);

	    $webProfile->setName("Carsgone " . uniqid())
	        ->setFlowConfig($flowConfig)
	        // Parameters for style and presentation.
	        ->setPresentation($presentation)
	        // Parameters for input field customization.
	        ->setInputFields($inputFields);

	    $createProfileResponse = $webProfile->create($this->_apiContext);

	    return $createProfileResponse->getId(); //The new webprofile's id
	}

	public function save_image(Request $request)
	{		
		if ($request->hasFile('file')) {
			$request->file('file')->move($this->upload_path, $request->file('file')->getClientOriginalName());
		}
	}

	public function remove_image(Request $request)
	{	
		File::delete("uploads/vehicle/".$request->file_name);
		return response()->json(['status' => 'success']);
	}

	public function rotate_image(Request $request)
	{	
		$filename = $this->upload_path."/".$request->file_name;
		// Load the image
		$source = imagecreatefromjpeg($filename);
		$degrees = -90;
		// Rotate
		$rotate = imagerotate($source, $degrees, 0);
		//and save it on your server...
		imagejpeg($rotate, $this->upload_path."/".$request->file_name);
		return response()->json(['status' => 'success']);
	}
}
