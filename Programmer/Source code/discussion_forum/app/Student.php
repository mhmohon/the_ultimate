<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'gender', 'user_id', 'dep_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Department::class, 'dep_id');
    }
}
