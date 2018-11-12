<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    public function affiliations()
	{
        return $this->belongsTo(Affiliation::class, 'affiliation_id','id')->select(['title','id']);
    }

    public function festivals()
	{
        return $this->belongsTo(Festival::class, 'festival_id','id')->select(['title','id']);
    }

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class);
    }

}
