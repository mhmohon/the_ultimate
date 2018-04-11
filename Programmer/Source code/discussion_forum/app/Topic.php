<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title', 'description','start_date','closure_date','end_date','status', 'view'
    ];

    public function idea()
    {
    	return $this->hasMany(Idea::class);
    }


}
