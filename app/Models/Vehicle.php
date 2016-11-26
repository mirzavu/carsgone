<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\StatusScope;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;

class Vehicle extends Model
{
    use Sluggable;
    protected $fillable = ['dealer_id', 'partner_vehicle_id','doors'];
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
        return $this->photos()->where('position',1)->value('path');
    }

    public function options()
    {
        return $this->belongsToMany('App\Models\Option', 'vehicle_option');
    }

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
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

    function scopeApplyFilter($query, $conditions, $dealer_ids, $featured = 0)
    {
        $query->select('vehicles.*')->where(function ($q) use($conditions, $dealer_ids)
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
                if ($conditions->get('lat'))
                {
                     $q->whereIn('dealer_id', $dealer_ids);
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

        if ($conditions->get('province'))
        {
            $query->join('dealers', 'vehicles.dealer_id', '=', 'dealers.id');

            $query->join('provinces', 'dealers.province_id', '=', 'provinces.id');
            $query->where('province_name', $conditions->get('province'));
        }
        //$query->addSelect('vehicles.*');
    //$query->join('makes', 'vehicles.make_id', '=', 'makes.id');
        // $query->addSelect('models.*');
        // $query->addSelect('makes.*');
        /*if (!empty($conditions->get('lat')))
        {
            
            if(!$this->_hasJoin($query, 'makes'))
                $query->join('makes', 'vehicles.make_id', '=', 'makes.id');

            if(!$this->_hasJoin($query, 'dealers'))
                $query->join('dealers', 'vehicles.dealer_id', '=', 'dealers.id');

            if(!$this->_hasJoin($query, 'models'))
                $query->join('models', 'vehicles.model_id', '=', 'models.id');
            
            if ($featured)
            {
                $query->where('dealers.featured', 1);
            }

        }*/
        // return $query;
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
