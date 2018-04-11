<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
        	'name' => 'EEE',
        	'description' => '',
        	'status' => '1'
        ]);
        Department::create([
        	'name' => 'CSE',
        	'description' => '',
        	'status' => '1'
        ]);
        Department::create([
        	'name' => 'CIS',
        	'description' => '',
        	'status' => '1'
        ]);
        Department::create([
        	'name' => 'BIT',
        	'description' => '',
        	'status' => '1'
        ]);
        Department::create([
        	'name' => 'ME',
        	'description' => '',
        	'status' => '1'
        ]);
    }
}
