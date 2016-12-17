<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	public $timestamps = false;
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function vehicles()
    {
        return $this->hasManyThrough('App\Models\Vehicle', 'App\Models\User');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
