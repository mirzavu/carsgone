<?php

namespace App\Http\Controllers;
use Validator;
use Debugbar;
use App\Http\Requests;
use App\Mailers\AppMailer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard(Request $request)
    {
        $this->middleware('auth');
        $vehicles = Auth::user()->vehicles()->take(10)->get();
        $saved_vehicles = Auth::user()->saved_vehicles()->take(10)->get();
        // $saved = saved_vehicles
    }

    public function postSignUp(Request $request, AppMailer $mailer)
    {
    	//if request ajax() need to check
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
    	$user->password = $password;
        $user->token = str_random(30);
    	$user->save();
        $mailer->sendEmailConfirmationTo($user);

    	Auth::login($user);
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
    }

    public function confirmEmail($token)
    {
        $user = User::whereToken($token)->firstOrFail();
        $user->verified = true;
        $user->token = null;
        $user->save();
        Auth::logout();
    }
}
