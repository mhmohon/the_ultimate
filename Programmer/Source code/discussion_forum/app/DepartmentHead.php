<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentHead extends Model
{
    protected $fillable = [
        'dep_id','user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
