<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Make extends Model
{
    use CrudTrait;

	public $timestamps = false;
    protected $fillable = array('make_name');

	
    public function models()
    {
        return $this->hasMany('App\Models\VehicleModel');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
