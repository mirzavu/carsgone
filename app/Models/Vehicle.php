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
            if ($conditions->has('content')) {
                $q->where('text', $conditions->get('content'));
            }

            return $q;
        })->whereHas('model', function($q) use ($conditions) {
            if ($conditions->has('model')) {
                $q->where('model_name', $conditions->get('model'));
            }
            return $q;
        })->whereHas('dealer', function($q) use ($conditions) {
            $lat = $conditions->get('lat');
            $lon = $conditions->get('lon');
            return $q->select(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->having('distance','<',10000); //3959 for miles
        });
    }
}
