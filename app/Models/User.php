<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }

    public function saved_vehicles()
    {
        return $this->belongsToMany('App\Models\Vehicle');
    }
}
