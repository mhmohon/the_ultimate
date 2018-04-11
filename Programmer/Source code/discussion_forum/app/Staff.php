<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'first_name', 'last_name','phone','gender','user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
