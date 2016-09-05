<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class VehicleModel extends Model
{
    use CrudTrait;
	public $timestamps = false;
    protected $table = 'models';
    protected $fillable = array('model_name','make_id');

	
    public function make()
    {
        return $this->belongsTo('App\Models\Make');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle', 'model_id');
    }
}
