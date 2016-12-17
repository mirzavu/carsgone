<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Backpack\CRUD\CrudTrait;
use Cviebrock\EloquentSluggable\Sluggable;
use DB;
use Log;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use CrudTrait;
    use Sluggable;

    protected $fillable = array('slug','name','email','password','role','address','partner_id','partner_dealer_id','city_id','province_id','phone','fax','url','postal_code','latitude','longitude','featured');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name'],
                'separator' => '-',
                'unique' => true
            ]
        ];
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::addGlobalScope('userStatus', function(Builder $builder) {
    //         $builder->where('users.status_id', '=', 1);
    //     });
    // }

    public function is($roleName)
    {
        if ($this->role == $roleName)
        {
            return true;
        }

        return false;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ];
    }



    public function setEmailAttribute($value)
    {
        if(empty($value) || $value == '')
        {
            $this->attributes['email'] = NULL;
        }
        else
        {
            $this->attributes['email'] = $value;
        }
        
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

    public function saved_vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle','vehicle_user');
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
            $query->join('provinces', 'users.province_id', '=', 'provinces.id');
            $query->where('province_name', $conditions->get('province'));
            if ($conditions->get('city'))
            {   
                $query->join('cities', 'users.city_id', '=', 'cities.id');
                $query->where('city_name', $conditions->get('city'));
            }
        }
    }


}
