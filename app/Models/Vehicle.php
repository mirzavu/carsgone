<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\StatusScope;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;

class Vehicle extends Model
{
    use Sluggable;
    protected $fillable = ['dealer_id', 'partner_vehicle_id'];
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['year', 'make.make_name', 'model.model_name','dealer.city.city_name','dealer.province.province_name'],
                'separator' => '-'
            ]
        ];
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

    public function ext_color()
    {
        return $this->belongsTo('App\Models\Color', 'ext_color_id');
    }

    public function int_color()
    {
        return $this->belongsTo('App\Models\Color' , 'int_color_id');
    }

    public function photos()
    {
        return $this->hasMany('App\Models\VehiclePhoto');
    }

    public function photo()
    {
        return $this->photos()->where('position',1)->value('path');
    }

    public function options()
    {
        return $this->hasMany('App\Models\VehicleOption');
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
            if ($conditions->get('condition')) {
                $q->where('condition', $conditions->get('condition'));
            }
            if ($conditions->get('transmission')) {
                $q->where('transmission', $conditions->get('transmission'));
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
            if ($conditions->get('year')) {
                $range = explode('-', $conditions->get('year'));

                $q->where('year', '>=',$range[0]);
                $q->where('year', '<=',$range[1]);
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
                $q->select(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->having('distance','<',$conditions->get('distance')); //3959 for miles
            }
            return $q;
        });
    }
}
