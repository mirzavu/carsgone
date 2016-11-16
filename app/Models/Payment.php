<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = array('vehicle_id', 'user_id', 'payment_id','status');

	
    public function vehicle()
    {
        return $this->belongsTo('App\Models\Vehicle');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
