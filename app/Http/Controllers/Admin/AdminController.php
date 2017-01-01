<?php

namespace App\Http\Controllers\Admin;
use App\Models\Vehicle;
use App\Models\User;

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
}
