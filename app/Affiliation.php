<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affiliation extends Model
{
	protected $guarded = [];

	public function festivals()
	{
	    return $this->hasMany(Festival::class);
	}

	public function events()
	{
	    return $this->hasMany(Event::class);
	}

}
