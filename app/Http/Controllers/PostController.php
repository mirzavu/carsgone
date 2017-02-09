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
use App\Models\Payment;
use Image;
use File;
use SEOMeta;
use Log;

class PostController extends Controller
{
	private $_apiContext;
	protected $upload_path;
	protected $colors;
	protected $doors;
	protected $cylinders;
	protected $fuel;

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

        $this->colors = ['Beige','Black','Blue','Bronze','Brown','Burgundy','Champagne','Charcoal','Dark Blue','Dark Green','Dark Grey','Gold','Green','Grey','Light Blue','Light Green','Maroon','Off White','Orange','Pewter','Plum','Purple','Red','Silver','Tan','Teal','White','Yellow'];
        // $this->doors = ['1','2','3','4','5','6']; 
        $this->doors = range(1, 6);
        $this->passengers = range(1, 16);
        $this->cylinders = range(1, 13);
        $this->fuels = ['Unleaded', 'Leaded', 'Premium', 'Diesel', 'Electric'];
	}
    

    public function newPost(Request $request)
	{	
		$data['location'] = getLocation($request);
		$data['makes'] = Make::all();
		$data['body_style_groups'] = BodyStyleGroup::all();
		return view('front.post.post', $data);
	}

	public function create(Request $request)
	{		

		//SEO
		SEOMeta::setTitle('Sell a car online free auto classifieds | Buy Sell and Trade Used Cars Canada');
        SEOMeta::setDescription('Sell my car free, advertise vehicles free, automotive classified, post or list free online auto listings');
        SEOMeta::addKeyword(['sell', 'used cars', 'auto', 'list vehicle', 'classifieds', 'vehicle']);
		$request['model_id'] = VehicleModel::where('model_name', $request['model'])->value('id');
		if(!empty($request['colour_exterior'])) $request['ext_color_id'] = Color::where('color', $request['colour_exterior'])->value('id');
		if(!empty($request['colour_interior'])) $request['int_color_id'] = Color::where('color', $request['colour_interior'])->value('id');
		if(!empty($request['fuel'])) $request['fuel_id'] = FuelType::where('fuel_type', $request['fuel'])->value('id');

		//Validate fields
		$validator = Validator::make($request->all(), [
            'make_id' => 'required|integer',
            'model_id' => 'required|integer',
            'year' => 'required|min:1970|max:2020|integer'
        ]);

        if ($validator->fails()) {
        	return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

        //Save vehicle
		$vehicle = Auth::user()->vehicles()->create($request->all());
		$vehicle->slug = null;
		if(Auth::user()->verified)
		{
			$vehicle->status_id = 1;
			$request->session()->flash('success', 'Vehicle has been posted Successfully! Check <a href="/dashboard">Dashboard</a>');
		}
		else
		{
			$vehicle->status_id = 0;
			$request->session()->flash('success', 'Vehicle has been posted Successfully! Verify your email address to publish your vehicle');
		}
		$vehicle->save();

		//Change user parameters from input
		$user = Auth::user();
		$user->phone = $request['phone'];
		$user->postal_code = $request['postal_code'];
		if($request->seller == "dealer")
			$user->role = "dealer";
		else
			$user->role = "member";
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($user->postal_code);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $loc_json = curl_exec($curl);
        $retry = 0;
        $loc_array = json_decode($loc_json);
        while($loc_array->status == "UNKNOWN_ERROR" && $retry < 5){
            $loc_json = curl_exec($curl);
            $loc_array = json_decode($loc_json);
            $retry++;
        }
        curl_close($curl);
        if($loc_array->status == "OK")
        {
            $user->latitude = $loc_array->results[0]->geometry->location->lat;
            $user->longitude = $loc_array->results[0]->geometry->location->lng;
        }  

		$user->save();

		//Save Vehicle Images
		$image_names = explode('^', $request['file_names']);
		
		$photos =[];$i=1;
		foreach($image_names as $image) {
			if(!empty($image))
            	array_push($photos, new VehiclePhoto(['position' => $i++, 'path' => '/uploads/vehicle/'.$image]));
        }
        $vehicle->photos()->saveMany($photos);

        //Payment
		if ($request->has('free')) {
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
		    $redirectUrls->setReturnUrl(url('/post/done').'?vehicle_id='.$vehicle->id);
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
	    $user_id = Auth::user()->id;
	    $payment = PayPal::getById($id, $this->_apiContext);

	    $paymentExecution = PayPal::PaymentExecution();

	    $paymentExecution->setPayerId($payer_id);
	    $executePayment = $payment->execute($paymentExecution, $this->_apiContext);
	    Payment::create(['user_id' => $user_id, 'vehicle_id' => $vehicle_id, 'payment_id' => $executePayment->id, 'state' => $executePayment->state ]);
	    Vehicle::withoutGlobalScopes()->whereId($vehicle_id)->update(['featured' => 1, 'featured_expires' => date('Y-m-d h:i:s', strtotime("+30 days"))]);
	    $request->session()->flash('success', 'Your Vehicle is promoted to Featured List!');
	    // dd($executePayment);
	    return redirect()->action('UserController@dashboard');
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

	public function saveImage(Request $request)
	{		
		if ($request->hasFile('file')) {
			$request->file('file')->move($this->upload_path, $request->file('file')->getClientOriginalName());
		}
	}

	public function removeImage(Request $request)
	{	
		File::delete("uploads/vehicle/".$request->file_name);
		return response()->json(['status' => 'success']);
	}

	public function removeImageEditPost(Request $request)
	{	
		$full_path = "uploads/vehicle/".$request->file_name;
		File::delete($full_path);
		Vehicle::withoutGlobalScopes()->where('id', $request->vehicle_id)->first()->photos()->where('path', $full_path)->delete();
		return response()->json(['status' => 'success']);
	}


	
	public function saveImageEditPost(Request $request)
	{	
		Vehicle::withoutGlobalScopes()->where('id', $request->vehicle_id)->first()->photos()->create([
			'position' => 1,
			'path' => $request->image_path
		]);
		return response()->json(['status' => 'success']);
	}

	public function rotateImage(Request $request)
	{	
		$filename = $this->upload_path."/".$request->file_name;
		// Load the image
		$img = Image::make($filename);
		$img->rotate(-90);
		$img->save($filename);
		// $source = imagecreatefromjpeg($filename);
		// $degrees = -90;
		// $rotate = imagerotate($source, $degrees, 0);
		// imagejpeg($rotate, $this->upload_path."/".$request->file_name);
		return response()->json(['status' => 'success']);
	}

	public function saveVehicle(Request $request)
	{	
		$vehicle_id = $request['vehicle_id'];
		$user = Auth::user();
		$user->saved_vehicles()->attach($vehicle_id);
		return response()->json(['status' => 'success']);
	}

	public function unsaveVehicle(Request $request)
	{	
		$vehicle_id = $request['vehicle_id'];
		$user = Auth::user();
		$user->saved_vehicles()->detach($vehicle_id);
		return response()->json(['status' => 'success']);
	}

	//Edit Vehicle
	public function editVehicle(Request $request, $id)
	{	
		
		$data['location'] = getLocation($request);
		// dd($data['makes']);
		
		$data['vehicle'] = Vehicle::withoutGlobalScopes()->findorFail($id);
		if(!Auth::check() || (Auth::user()->id != $data['vehicle']->user_id))
		{
			return redirect()->action('HomeController@index');
		}
		$data['user'] = Auth::user();
		$data['makes'] = Make::pluck('make_name', 'id');
		// dd($data['vehicle']);
		$data['vehicle']->model = $data['vehicle']->model_id; //to match with form builder
		$data['models'] = $data['vehicle']->make()->first()->models()->pluck('model_name','id');
		$data['body_style_groups'] = BodyStyleGroup::pluck('body_style_group_name', 'id')->prepend('Select Body Style', null);
		$data['exterior_colors'] = array(null => 'Select Exterior Color') + array_combine($this->colors, $this->colors);
		$data['vehicle']->colour_exterior = Color::where('id',$data['vehicle']->ext_color_id)->value('color');
		$data['interior_colors'] = array(null => 'Select Interior Color') + array_combine($this->colors, $this->colors);
		$data['vehicle']->colour_interior = Color::where('id',$data['vehicle']->int_color_id)->value('color');
		$data['doors'] = array(null => 'Select Doors') + array_combine($this->doors, $this->doors);
		$data['passengers'] = array(null => 'Select Passenger') + array_combine($this->passengers, $this->passengers);
		$data['cylinders'] = array(null => 'Select Cylinders') + array_combine($this->cylinders, $this->cylinders);
		$data['fuels'] = array(null => 'Select Fuel Type') + array_combine($this->fuels, $this->fuels);
		$data['images'] = $data['vehicle']->photos()->get();

		if($data['images']->count()) //extracting image key from url
		{
			$image = explode('/', $data['images'][0]['path']);
			$data['image_key'] = explode('_', end($image))[0];
		}
		else
		{
			$data['image_key'] = str_random(15);
		}
		$data['dropzone_files'] = $data['images']->toJson();
		return view('front.post.edit', $data);
	}

	public function updateVehicle(Request $request, $id)
	{
		if(!empty($request['colour_exterior'])) $request['ext_color_id'] = Color::where('color', $request['colour_exterior'])->value('id');
		if(!empty($request['colour_interior'])) $request['int_color_id'] = Color::where('color', $request['colour_interior'])->value('id');
		if(!empty($request['fuel'])) $request['fuel_id'] = FuelType::where('fuel_type', $request['fuel'])->value('id');

		$validator = Validator::make($request->all(), [
            'make_id' => 'required|integer',
            'model_id' => 'required|integer',
            'year' => 'required|min:1970|max:2020|integer'
        ]);

        if ($validator->fails()) {
        	return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }
        $vehicle = Vehicle::withoutGlobalScopes()->findorFail($id);
		$vehicle->update($request->all());

		//Change user parameters from input
		$user = Auth::user();
		$user->phone = $request['phone'];
		$user->postal_code = $request['postal_code'];
		if($request->seller == "dealer")
			$user->role = "dealer";
		else
			$user->role = "member";
		$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($user->postal_code);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $loc_json = curl_exec($curl);
        $retry = 0;
        $loc_array = json_decode($loc_json);
        while($loc_array->status == "UNKNOWN_ERROR" && $retry < 5){
            $loc_json = curl_exec($curl);
            $loc_array = json_decode($loc_json);
            $retry++;
        }
        curl_close($curl);
        if($loc_array->status == "OK")
        {
            $user->latitude = $loc_array->results[0]->geometry->location->lat;
            $user->longitude = $loc_array->results[0]->geometry->location->lng;
        }  

		$user->save();

		
		if ($request->has('free') || $request->has('paid')) {
			if(Auth::user()->verified)
			{
				$request->session()->flash('success', 'Your changes are saved! Check <a href="/dashboard">Dashboard</a>');
			}
			else
			{
				$request->session()->flash('success', 'Your changes are saved! Verify your email address to publish your vehicle');
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
		    $redirectUrls->setReturnUrl(action('PostController@getDone').'?vehicle_id='.$vehicle->id);
		    $redirectUrls->setCancelUrl(action('PostController@newPost'));

		    $payment = PayPal::Payment();
		    $payment->setIntent('sale');
		    $payment->setPayer($payer);
		    $payment->setRedirectUrls($redirectUrls);
		    $payment->setTransactions(array($transaction));
		    $payment->setExperienceProfileId($this->createWebProfile());
		    $response = $payment->create($this->_apiContext);
		    $redirectUrl = $response->links[1]->href;

		    return response()->json(['status' => 'paypal', 'url' => $redirectUrl]);
		}
	}

}
