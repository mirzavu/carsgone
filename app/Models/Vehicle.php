<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\StatusScope;
use DB;

class Vehicle extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope);
    }

    public function dealer()
    {
        return $this->belongsTo('App\Models\Dealer');
    }

    public function bodyStyleGroup()
    {
        return $this->belongsTo('App\Models\BodyStyleGroup');
    }

    public function model()
    {
        return $this->belongsTo('App\Models\VehicleModel');
    }

    public function make()
    {
        return $this->belongsTo('App\Models\Make');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
    }

    public function scopeApplyFilter($query, $conditions, $featured=0)
    {

        return $query->where(function($q) use ($conditions){
            if ($conditions->get('content')) {
                $q->where('text', $conditions->get('content'));
            }

            if ($conditions->get('price')) {
                $range = explode('-', $conditions->get('price'));

                $q->where('price', '>=',$range[0]);
                $q->where('price', '<=',$range[1]);
            }
            if ($conditions->get('odometer')) {
                $range = explode('-', $conditions->get('odometer'));

                $q->where('odometer', '>=',$range[0]);
                $q->where('odometer', '<=',$range[1]);
            }

            return $q;
        })->whereHas('model', function($q) use ($conditions) {
            if ($conditions->get('model')) {
                $q->where('model_name', $conditions->get('model'));
            }
            return $q;
        })->whereHas('make', function($q) use ($conditions) {
            if ($conditions->get('make')) {
                $q->where('make_name', $conditions->get('make'));
            }
            return $q;
        })->whereHas('dealer.province', function($q) use ($conditions) {
            if ($conditions->get('province')) {
                $q->where('province_name', $conditions->get('province'));
            }
            return $q;
        })->whereHas('dealer', function($q) use ($conditions, $featured) {
            if($featured){
                $q->where('featured', 1);
            }
            if ($conditions->get('lat')) {
                $lat = $conditions->get('lat');
                $lon = $conditions->get('lon');
                $q->select(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->having('distance','<',10000); //3959 for miles
            }
            return $q;
        });
    }
}
