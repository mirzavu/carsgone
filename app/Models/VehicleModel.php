<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
	public $timestamps = false;
    protected $table = 'models';

	
    public function make()
    {
        return $this->belongsTo('App\Models\Make');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
