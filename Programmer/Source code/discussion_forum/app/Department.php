<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
	protected $fillable = [
        'name', 'description','status',
    ];
    

    public function student()
    {
    	return $this->hasMany(Student::class);
    }

    public static function active()
    {
    	return static::where('status', 1);
    }
}
