<?php

namespace App\Http\Controllers;
use Validator;
use App\Http\Requests;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function postSignUp(Request $request)
    {
    	//if request ajax() need to check
    	$validator = Validator::make($request->all(), [
            'email' => 'required|email|max:150|unique:users',
            'first_name' => 'required|max:120',
            'password' => 'required|min:6|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'fail', 'error' => $validator->errors()->first()]);
        }

    	$email = $request['email'];
    	$first_name = $request['first_name'];
    	$password = bcrypt($request['password']);
    	$user = new User();
    	$user->email = $email;
    	$user->name = $first_name;
    	$user->password = $password;
    	$user->save();

    	Auth::login($user);
    	$id = Auth::user()->id;
    	return response()->json(['status' => 'success', 'id' => $id, 'email' => $email, 'name' => $first_name]);
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
}
