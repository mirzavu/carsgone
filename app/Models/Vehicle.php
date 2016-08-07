<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }

    public function model()
    {
        return $this->belongsTo('App\Models\VehicleModel');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
    }

    public function scopeApplyFilter($query, $conditions)
    {
        return $query->where(function($q) use ($conditions){
            if ($conditions->get('dealer_i')) {
                $q->where('dealer_id', $conditions->get('dealer_id'));
            }

            return $q;
        })->whereHas('model', function($q) use ($conditions) {
            return $q->where(['model_name'=>'CL']);
        });
    }
}
