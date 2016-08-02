<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Make extends Model
{
    public function models()
    {
        return $this->hasMany('App\Models\Model');
    }

    public function vehicles()
    {
        return $this->hasMany('App\Models\Vehicle');
    }
}
