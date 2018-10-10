<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $guarded = [];

    public function affiliations()
	{
        return $this->belongsTo(Affiliation::class, 'affiliation_id','id')->select(['title','id']);
    }
}
