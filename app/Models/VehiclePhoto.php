<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehiclePhoto extends Model
{
    public $timestamps = false;
    protected $fillable = ['position','path'];
}
