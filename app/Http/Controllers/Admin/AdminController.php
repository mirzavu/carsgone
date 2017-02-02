<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;
use App\Models\Setting;

class AdminController extends \Backpack\Base\app\Http\Controllers\AdminController
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('super');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard'); // set the page title
        $this->data['vehicles_count'] = Vehicle::count();
        $this->data['dealers_count'] = User::where('role','dealer')->count();
        $this->data['users_count'] = User::where('role','member')->count();

        return view('backpack::dashboard', $this->data);
    }

    public function settings()
    {
        $this->data['setting'] = Setting::first();
        return view('backpack::settings', $this->data);
    }

    
    public function settingUpdate(Request $request)
    {
        $setting = Setting::first();
        if(empty($setting))
            $setting = new Setting;
        $setting->address = $request['address'];
        $setting->postal_code = $request['postal_code'];
        $setting->phone = $request['phone'];
        $setting->save();
        return view('backpack::settings', compact('setting'));
    }
}
