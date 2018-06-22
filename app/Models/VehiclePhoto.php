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

    public function getPathAttribute($value)
    { 
        if(!isset($value[0]))
        {
            return $value;
        }
        else if($value[0] == '/')
        {
            $value = url('/').$value;
        }
        else
        {
            $value = preg_replace("/^http:/i", "https:", $value);
        }
        return $value;
    }
}
