<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $fillable = ['city_name','province_id'];

    public function users()
    {
        return $this->hasMany('App\Models\User');
    }

    public function vehicles()
    {
        return $this->hasManyThrough('App\Models\Vehicle', 'App\Models\User');
    }

    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }
}
