<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laravellikecomment_total_like extends Model
{
    protected $fillable = [
        'item_id', 'total_like','total_dislike'
    ];

    public function idea()
    {
    	return $this->belongsTo(Idea::class, 'item_id');
    }
}
