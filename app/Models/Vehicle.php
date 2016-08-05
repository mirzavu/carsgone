<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }

    public function model()
    {
        return $this->belongsTo('App\Models\VehicleModel');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
    }
}
