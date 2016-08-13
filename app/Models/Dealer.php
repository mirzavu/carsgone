<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Dealer extends Model
{
    use CrudTrait;

    protected $fillable = array('code','name','email','address','partner_id','partner_dealer_id','city_id','province_id','phone','fax','url','postal_code','latitude','longitude','featured');

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
