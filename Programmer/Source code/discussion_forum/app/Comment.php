<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'description','name','status','user_id','idea_id'
    ];

    public function idea()
    {
    	return $this->belongsTo(Idea::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
