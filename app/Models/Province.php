<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function dealers()
    {
        return $this->hasMany('App\Models\Dealer');
    }

    public function vehicles()
    {
        return $this->hasManyThrough('App\Models\Vehicle', 'App\Models\Dealer');
    }
}
