<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    protected $guarded = [];

    public function categories()
	{
        return $this->belongsTo(CampCategory::class, 'category_id','id')->select(['title','id']);
    }
}
