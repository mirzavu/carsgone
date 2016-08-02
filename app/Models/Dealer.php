<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
