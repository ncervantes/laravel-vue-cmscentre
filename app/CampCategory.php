<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampCategory extends Model
{
    protected $guarded = [];

    public function camps()
	{
	    return $this->hasMany(Camp::class);
	}
}
