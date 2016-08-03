<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyStyleGroup extends Model
{
	public $timestamps = false;
	
    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }    
}
