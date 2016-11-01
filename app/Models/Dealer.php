<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use Barryvdh\Debugbar\Facade as Debugbar;
use DB;

class Dealer extends Model
{
    use CrudTrait;
    use Sluggable;
    protected $fillable = array('code','name','email','address','partner_id','partner_dealer_id','city_id','province_id','phone','fax','url','postal_code','latitude','longitude','featured');

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('dealerStatus', function(Builder $builder) {
            $builder->where('dealers.status_id', '=', 1);
        });
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '-'
            ]
        ];
    }

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

    public function scopeActive($query)
    {
        return $query->where('status_id', '=', 1);
    }

    function scopeApplyFilter($query, $conditions)
    {
        $query->where(function ($q) use($conditions)
            {
                if ($conditions->get('name'))
                {
                    $q->where('name', 'like', '%' . $conditions->get('name') . '%');
                }
                if ($conditions->get('postal_code'))
                {
                    $q->where('postal_code', $conditions->get('postal_code'));
                }
                return $q;
            }
        );
        
        if ($conditions->get('province'))
        {   
            Debugbar::info($conditions->get('province'));
            $query->join('provinces', 'dealers.province_id', '=', 'provinces.id');
            $query->where('province_name', $conditions->get('province'));
            if ($conditions->get('city'))
            {   
                Debugbar::info($conditions->get('city'));
                $query->join('cities', 'dealers.city_id', '=', 'cities.id');
                $query->where('city_name', $conditions->get('city'));
            }
        }
    }
}
