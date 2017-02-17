<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclePhoto extends Model
{
    public $timestamps = false;
    protected $fillable = ['position','path'];

    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }
}
