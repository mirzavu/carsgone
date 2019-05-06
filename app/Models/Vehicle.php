<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use App\Scopes\StatusScope;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;
use Log;

class Vehicle extends Model
{
    use Sluggable;
    protected $fillable = ['user_id', 'make_id', 'model_id', 'year','odometer', 'partner_vehicle_id', 'transmission', 'price', 'trim', 'body_style_group_id','ext_color_id', 'int_color_id','doors','passenger','text','drive_type_id', 'engine_cylinders', 'fuel_id', 'engine_description'  ];
    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope(new StatusScope);
    // }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['year', 'make.make_name', 'model.model_name','user.city.city_name','user.province.province_name'],
                'separator' => '-',
                'unique' => true,
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
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
        return $this->hasMany('App\Models\VehiclePhoto')->orderBy('position', 'asc');
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
        $this->attributes['price'] = preg_replace('/[^0-9.]/', '', $value);
    }

    public function getPriceAttribute($value)
    {
        return number_format($value);
    }

    public function setOdometerAttribute($value)
    {
        $this->attributes['odometer'] = preg_replace('/[^0-9.]/', '', $value);;
    }

    public function getOdometerAttribute($value)
    {
        return number_format($value);
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

        $query->where(function ($q) use($conditions, $featured)
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
                    if (strpos($conditions->get('year'), '-') == false) { // If there is no '-'
                        abort(404);
                    }
                    $range = explode('-', $conditions->get('year'));
                    $q->where('year', '>=', $range[0]);
                    $q->where('year', '<=', $range[1]);
                }

                // if($featured ==1)
                // {
                //     $q->orWhere('vehicles.featured', 1);
                // }
                $q->where('vehicles.status_id',1)->where('vehicles.created_at', '>', DB::raw('DATE_SUB(NOW(),INTERVAL 1 YEAR)'));
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

        if ($conditions->get('body'))
        {
            $query->join('body_style_groups', 'vehicles.body_style_group_id', '=', 'body_style_groups.id');
            $query->where('body_style_group_name', $conditions->get('body'));
        }

        if ($conditions->get('dealer'))
        {
            $query->join('users', 'vehicles.user_id', '=', 'users.id');
            $query->where('users.name', $conditions->get('dealer'));
        }

        if ($conditions->get('province'))
        {
            if(!$this->_hasJoin($query, 'users')){
                $query->join('users', 'vehicles.user_id', '=', 'users.id');
            }
            

            $query->join('provinces', 'users.province_id', '=', 'provinces.id');
            $query->where('province_name', $conditions->get('province'));
        }

        if ($conditions->get('city'))
        {
            $query->join('cities', 'users.city_id', '=', 'cities.id');
            $query->where('city_name', $conditions->get('city'));
        }

        if ($conditions->get('distance'))
        {
            $query->leftJoin('users', 'vehicles.user_id', '=', 'users.id');
            if($conditions->get('distance')!="All")
            {
                $lat = $conditions->get('lat');
                $lon = $conditions->get('lon');
                $query->select(DB::raw("users.id"))
                     ->whereRaw("( 6371 * acos( cos( radians($lat) ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians($lon) ) + sin( radians($lat) ) * sin( radians( latitude ) ) ) ) < ".$conditions->get('distance'));
            }
            

        }

        if($featured ==1)
        {
            $query->where(function ($subquery) {
                $subquery->where('users.featured', '=', 1)
                      ->orWhere('vehicles.featured', '=', 1);
            });
        }

        if ($conditions->get('user'))
        {
            $query->leftJoin('vehicle_user', 'vehicles.id', '=', 'vehicle_user.vehicle_id')
            ->select("vehicle_user.user_id AS saved");
        }

        if ($conditions->get('seller'))
        {
            $role = ($conditions->get('seller') == "private"?"member":"dealer");
            // dd($role);
            $query->where('users.role', '=',$role);
        }
        $query->addSelect('vehicles.*');
    }

    protected function _hasJoin($query, $table){
        $joins = $query->getQuery()->joins;
        if(empty($joins)) return false;
        foreach($joins as $row){
            if($row->table == $table){
                return true;
            }
        }
        return false;
    }

}
