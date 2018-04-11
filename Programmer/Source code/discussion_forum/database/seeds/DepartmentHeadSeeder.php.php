<?php

use Illuminate\Database\Seeder;
use App\DepartmentHead;
class DepartmentHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DepartmentHead::create([
        	'dep_id' => '1',
        	'user_id' => '3'
        ]);
        DepartmentHead::create([
        	'dep_id' => '2',
        	'user_id' => '4'
        ]);
    }
}
