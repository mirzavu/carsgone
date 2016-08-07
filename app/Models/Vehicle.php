<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

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
        })->whereHas('dealer', function($q) use ($conditions) {
            $lat = $conditions->get('lat');
            $lon = $conditions->get('lon');
            return $q->select(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->having('distance','<',10000); //3959 for miles
        });
    }
}
