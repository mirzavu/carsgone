<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests;
use App\Mailers\AppMailer;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Log;
use Hash;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        $this->middleware('auth');
        if(Auth::user()->verified)
        {
            $request->session()->flash('message', 'Verify your email address to enjoy uninterrupted services.');
        }
        $data['location'] = getLocation($request);
        $data['email'] = Auth::user()->email;
        $data['postal_code'] = Auth::user()->postal_code;
        $data['vehicles'] = Auth::user()->vehicles()->withoutGlobalScopes()->latest()->take(10)->get();
        // dd($data['vehicles']->count());
        $data['saved_vehicles'] = Auth::user()->saved_vehicles()->take(10)->get();
        return view('front.dashboard', $data);

        // $saved = saved_vehicles
    }

    public function postSignUp(Request $request, AppMailer $mailer)
    {
    	//if request ajax() need to check
        $location = getLocation($request);
        // Log::info($location);
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email|max:150|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:6|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

    	$email = $request['email'];
    	$name = $request['name'];
    	$password = bcrypt($request['password']);
    	$user = new User();
    	$user->email = $email;
    	$user->name = $name;
        $user->role = 'member';
    	$user->password = $password;
        $user->token = str_random(30);
        $user->latitude = $location['lat'];
        $user->longitude = $location['lon'];
        //changelater
        //$province_id = Province::where('province_code',$location['region'])->value('id');
        $province_id = 1;
        $city = City::firstOrCreate(['city_name'=> $location['place'],'province_id'=> $province_id]);
        $user->province_id = $province_id;
        $user->city_id = $city->id;
    	$user->save();
    	Auth::login($user);
        $mailer->sendEmailConfirmationTo($user);
    	$id = Auth::user()->id;
    	return response()->json(['status' => 'success', 'id' => $id, 'email' => $email, 'name' => $name]);
    }



    public function postSignIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {	
            return response()->json(['status' => 'success', 'id' => Auth::user()->id, 'email' => Auth::user()->email, 'name' => Auth::user()->name]);
        }
        else
        {
        	return response()->json(['status' => 'fail', 'error' => 'Email address or password is incorrect']);
        }
        
    }

    public function postLoginSignup(Request $request, AppMailer $mailer)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])) {    
            return response()->json(['status' => 'success', 'id' => Auth::user()->id, 'email' => Auth::user()->email, 'name' => Auth::user()->name]);
        }
        elseif (User::where('email', '=', $request['email'])->exists()) {
            return response()->json(['status' => 'fail', 'error' => 'Incorrect password. Please try again!']);
        }
        else
        {
            $password = bcrypt($request['password']);
            $user = new User();
            $user->email = $request['email'];
            $user->role = 'member';
            $user->password = $password;
            $user->token = str_random(30);
            $user->save();
            Auth::login($user);
            $mailer->sendEmailConfirmationTo($user);
            return response()->json(['status' => 'success', 'id' => $user->id, 'email' => $user->email]);
        }
    }

    

    public function loggedInUser(Request $request)
    {
        if ($request->user()) {
            return response()->json(['status' => 'success', 'id' => $request->user()->id]);
        }
        else
        {
            return response()->json(['status' => 'fail']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action('HomeController@index');
    }

    public function confirmEmail($token, Request $request)
    {
        $user = User::whereToken($token)->firstOrFail();
        $user->verified = true;
        $user->save();
        Auth::login($user);
        $request->session()->flash('success', 'Your Email confirmation is Successful!');
        return redirect()->action('UserController@dashboard');
    }

    public function confirmVehicle($slug, $token, Request $request)
    {
        $user = User::whereToken($token)->firstOrFail();
        $user->verified = true;
        $user->save();
        Auth::login($user);
        $user->vehicles()->where('slug', $slug)->update(['status_id' => 1]);
        $request->session()->flash('success', 'Your Vehicle is activated successfully!');
        return redirect()->action('SearchController@searchHandler');
    }

    public function tokenEditVehicle($slug, $token,  Request $request)
    {
        $user = User::whereToken($token)->firstOrFail();
        $user->verified = true;
        $user->save();
        Auth::login($user);
        $vehicle_id = $user->vehicles()->where('slug', $slug)->value('id');
        return redirect()->action('PostController@editVehicle', ['id' => $vehicle_id]);
    }
    

    public function changeEmail(Request $request, AppMailer $mailer)
    {
        $validator = Validator::make($request->all(), [
            'new_email' => 'required|email|max:150',
            'confirm_email' => 'required|max:120',
            'password' => 'required|min:6|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

        if(!Auth::check()) return response()->json(['status' => 'fail', 'error' => 'Session expired. Please SignIn again.']);

        $user = Auth::user();
        $new_email = $request['new_email'];
        $password = $request['password'];

        
        if(Hash::check($password, $user->password))
        {
            $emails_exists = User::where('email','=',$new_email)->first();
            Log::info($emails_exists);
            if($emails_exists)
            {
                return response()->json(['status' => 'fail', 'error' => 'Email already exists.']);
            }
            else
            {
                $user->email = $new_email;
                $user->token = str_random(30);
                $user->verified = false;
                $user->save();
                $mailer->sendEmailChangeConfirmationTo($user);
                return response()->json(['status' => 'success', 'email' => $new_email]);
            }
        }
        else
        {
            return response()->json(['status' => 'fail', 'error' => 'Incorrect Password. Please try again.']);
        }
        
    }

    public function changePassword(Request $request, AppMailer $mailer)
    {
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6|max:100',
            'confirm_new_password' => 'required|min:6|max:100',
            'password' => 'required|min:6|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

        if(!Auth::check()) return response()->json(['status' => 'fail', 'error' => 'Session expired. Please SignIn again.']);

        $user = Auth::user();
        $new_password = $request['new_password'];
        $password = $request['password'];

        Log::info($user->password);
        if(Hash::check($password, $user->password))
        {
            $user->password = bcrypt($new_password);
            $user->save();
            $mailer->sendPasswordChangeNotificationTo($user);
            return response()->json(['status' => 'success', 'message' => 'Your password is changed successfully!']);
        }
        else
        {
            return response()->json(['status' => 'fail', 'error' => 'Incorrect current Password. Please try again.']);
        }
        
    }

    public function changePostalCode(Request $request)
    {
        if(!Auth::check()) return response()->json(['status' => 'fail', 'error' => 'Session expired. Please SignIn again.']);
        $user = Auth::user();
        $user->postal_code = $request['postal_code'];
        $user->save();
        return response()->json(['status' => 'success', 'message' => 'Your postal code is changed successfully!']);
    }

    public function sendResetLink(Request $request, AppMailer $mailer)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:150'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }
        $email = $request['email'];
        $user = User::where('email','=',$email)->first();
        if($user)
        {
            $user->token = str_random(30);
            $user->save();
            $mailer->sendResetPasswordLinkTo($user);
            return response()->json(['status' => 'success', 'message' =>'Reset Passwork link is successfully sent to your email address']);
        }
        else
        {
            return response()->json(['status' => 'fail', 'error' => 'User not found in our records. Contact Us for any issues.']);
        }
        
    }

    public function getResetPassword(Request $request, AppMailer $mailer, $token='')
    {
        $user = User::whereToken($token)->firstOrFail();
        $data['token'] = $token;
        return view('front.pages.reset_password', $data);
    }

    public function postResetPassword(Request $request, AppMailer $mailer)
    {
        $user = User::whereToken($request['token'])->firstOrFail();
        $user->password = bcrypt($request['new_password']);
        Log::info($request['new_password']);
        $user->save();
        return response()->json(['status' => 'success', 'message' => 'Password changed successfully']);
        
    }

    public function activateVehicle(Request $request)
    {
        $vehicle_id = $request['vehicle_id'];
        $user = Auth::user();
        if($user->verified)
        {
            Vehicle::withoutGlobalScopes()->whereId($vehicle_id)->update(['status_id' => 1]);
            return response()->json(['status' => 'success']);
        }
        else
        {
            return response()->json(['status' => 'fail', 'message' => 'Please confirm your email address to activate']);
        }
    }

    public function deactivateVehicle(Request $request)
    {
        $vehicle_id = $request['vehicle_id'];
        $user = Auth::user();
        Vehicle::withoutGlobalScopes()->whereId($vehicle_id)->update(['status_id' => 0]);
        return response()->json(['status' => 'success']);
    }

    public function deleteVehicle(Request $request)
    {
        $vehicle_id = $request['vehicle_id'];
        $user = Auth::user();
        
        $vehicle = Vehicle::withoutGlobalScopes()->whereId($vehicle_id)->first();
        Log::info($vehicle_id);
        if($vehicle->user->id == $user->id)
        {
            $vehicle->photos()->delete();
            $vehicle->options()->detach();
            $vehicle->delete();
        }
        return response()->json(['status' => 'success']);
    }
    

    public function postDealerSignUp(Request $request, AppMailer $mailer)
    {
        //if request ajax() need to check
        $location = getLocation($request);
        // Log::info($location);
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:150|unique:users',
            'name' => 'required|max:120',
            'password' => 'required|min:6|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

        $email = $request['email'];
        $name = $request['name'];
        $password = bcrypt($request['password']);
        $user = new User();
        $user->email = $email;
        $user->name = $name;
        $user->role = 'dealer';
        $user->password = $password;
        $user->token = str_random(30);
        if(!empty($request->postal_code))
        {
            $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($request->postal_code);
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
        }
        //changelater
        $province_id = Province::where('province_code',$location['region'])->value('id');
        // $province_id = 1;
        $city = City::firstOrCreate(['city_name'=> $location['place'],'province_id'=> $province_id]);
        $user->province_id = $province_id;
        $user->city_id = $city->id;
        $user->save();
        $mailer->sendEmailConfirmationTo($user);

        Auth::login($user);
        $id = Auth::user()->id;
        return response()->json(['status' => 'success', 'id' => $id, 'email' => $email, 'name' => $name]);
    }
    
}
