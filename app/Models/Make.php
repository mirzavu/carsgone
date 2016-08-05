<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
	public $timestamps = false;
	
    public function models()
    {
        return $this->hasMany('App\Models\VehicleModel');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
