<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyStyleGroup extends Model
{
	public $timestamps = false;
	protected $fillable = ['body_style_group_name'];
	
    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }    
}
