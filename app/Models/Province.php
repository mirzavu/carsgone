<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
	public $timestamps = false;
    public function dealers()
    {
        return $this->hasMany('App\Models\Dealer');
    }

    public function vehicles()
    {
        return $this->hasManyThrough('App\Models\Vehicle', 'App\Models\Dealer');
    }

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }
}
