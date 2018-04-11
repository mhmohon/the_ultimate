<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $fillable = [
        'title', 'description','name','view','status','user_id','topic_id'
    ];

    public function topic()
    {
    	return $this->belongsTo(Topic::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function reaction()
    {
        return $this->hasMany(Laravellikecomment_total_like::class);
    }
}
