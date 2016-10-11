<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyStyle extends Model
{
	public $timestamps = false;
	protected $fillable = ['body_style_name'];
}