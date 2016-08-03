<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Model extends Model
{
	public $timestamps = false;
	
    public function make()
    {
        return $this->belongsTo('App\Models\Make');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
