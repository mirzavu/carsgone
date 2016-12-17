<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\StatusScope;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;

class Vehicle extends Model
{
    use Sluggable;
    protected $fillable = ['dealer_id', 'make_id', 'model_id', 'year','odometer', 'partner_vehicle_id', 'transmission', 'price', 'trim', 'body_style_group_id','ext_color_id', 'int_color_id','doors','passenger','text','drive_type_id', 'engine_cylinders', 'fuel_id', 'engine_description'  ];
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

    public function bodyStyle()
    {
        return $this->belongsTo('App\Models\BodyStyle');
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
        return $this->photos()->value('path');
    }

    public function options()
    {
        return $this->belongsToMany('App\Models\Option', 'vehicle_option');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = preg_replace('/[^0-9.]/', '', $value);;
    }

    public function setMileageAttribute($value)
    {
        $this->attributes['mileage'] = preg_replace('/[^0-9.]/', '', $value);;
    }

    // public function scopeApplyFilter($query, $conditions, $featured=0)
    // {

    //     return $query->where(function($q) use ($conditions){
    //         if ($conditions->get('content')) {
    //             $q->where('text', 'like', '%'.$conditions->get('content').'%' );
    //         }
    //         if ($conditions->get('condition')) {
    //             $q->where('condition', $conditions->get('condition'));
    //         }
    //         if ($conditions->get('transmission')) {
    //             $q->where('transmission', $conditions->get('transmission'));
    //         }
    //         if ($conditions->get('price')) {
    //             $range = explode('-', $conditions->get('price'));

    //             $q->where('price', '>=',$range[0]);
    //             $q->where('price', '<=',$range[1]);
    //         }
    //         if ($conditions->get('odometer')) {
    //             $range = explode('-', $conditions->get('odometer'));

    //             $q->where('odometer', '>=',$range[0]);
    //             $q->where('odometer', '<=',$range[1]);
    //         }
    //         if ($conditions->get('year')) {
    //             $range = explode('-', $conditions->get('year'));

    //             $q->where('year', '>=',$range[0]);
    //             $q->where('year', '<=',$range[1]);
    //         }

    //         return $q;
    //     })->whereHas('model', function($q) use ($conditions) {
    //         if ($conditions->get('model')) {
    //             $q->where('model_name', $conditions->get('model'));
    //         }
    //         return $q;
    //     })->whereHas('make', function($q) use ($conditions) {
    //         if ($conditions->get('make')) {
    //             $q->where('make_name', $conditions->get('make'));
    //         }
    //         return $q;
    //     })->whereHas('dealer.province', function($q) use ($conditions) {
    //         if ($conditions->get('province')) {
    //             $q->where('province_name', $conditions->get('province'));
    //         }
    //         return $q;
    //     })->whereHas('dealer', function($q) use ($conditions, $featured) {
    //         if($featured){
    //             $q->where('featured', 1);
    //         }
    //         if ($conditions->get('lat')) {
    //             //$conditions->put('distance',5000);
    //             $lat = $conditions->get('lat');
    //             $lon = $conditions->get('lon');
    //             $lat = 53.421879;
    //             $lon = -113.4675614;
    //             $q->select(DB::raw("id, ( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) AS distance"))->where('distance','<',$conditions->get('distance')); //3959 for miles
    //         }
    //         return $q;
    //     });
    // }

    function scopeApplyFilter($query, $conditions, $featured = 0)
    {
        $query->where(function ($q) use($conditions)
            {
                if ($conditions->get('content'))
                {
                    $q->where('text', 'like', '%' . $conditions->get('content') . '%');
                }
                if ($conditions->get('condition'))
                {
                    $q->where('condition', $conditions->get('condition'));
                }
                if ($conditions->get('transmission'))
                {
                    $q->where('transmission', $conditions->get('transmission'));
                }
                if ($conditions->get('price'))
                {
                    $range = explode('-', $conditions->get('price'));
                    $q->where('price', '>=', $range[0]);
                    $q->where('price', '<=', $range[1]);
                }

                if ($conditions->get('odometer'))
                {
                    $range = explode('-', $conditions->get('odometer'));
                    $q->where('odometer', '>=', $range[0]);
                    $q->where('odometer', '<=', $range[1]);
                }

                if ($conditions->get('year'))
                {
                    $range = explode('-', $conditions->get('year'));
                    $q->where('year', '>=', $range[0]);
                    $q->where('year', '<=', $range[1]);
                }
                
                return $q;
            }
        );
        
        if ($conditions->get('model'))
        {
            $query->join('models', 'vehicles.model_id', '=', 'models.id');
            $query->where('model_name', $conditions->get('model'));

        }
            
        if ($conditions->get('make'))
        {
            $query->join('makes', 'vehicles.make_id', '=', 'makes.id');
            $query->where('make_name', $conditions->get('make'));
        }

        if ($conditions->get('dealer'))
        {
            $query->join('dealers', 'vehicles.dealer_id', '=', 'dealers.id');
            $query->where('dealers.slug', $conditions->get('dealer'));
        }

        if ($conditions->get('province'))
        {
            $query->join('dealers', 'vehicles.dealer_id', '=', 'dealers.id');

            $query->join('provinces', 'dealers.province_id', '=', 'provinces.id');
            $query->where('province_name', $conditions->get('province'));
        }
        if ($conditions->get('distance'))
        {
            $lat = 53.421879;
            $lon = - 113.4675614;
            $query->leftJoin('dealers', 'vehicles.dealer_id', '=', 'dealers.id')
                 ->select(DB::raw("dealers.id"))
                 ->whereRaw("( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) < ".$conditions->get('distance'))
                 ->orWhere('latitude', '=', null); // For including private vehicles
        }
        if ($conditions->get('user'))
        {
            $query->leftJoin('vehicle_user', 'vehicles.id', '=', 'vehicle_user.vehicle_id')
            ->select("vehicle_user.user_id AS saved");
        }
        $query->addSelect('vehicles.*');
    }

}
