<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Staff;
use App\Student;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'email' => 'onlinebdforum@gmail.com',
        	'password' => bcrypt('forum@admin'),
        	'user_role' => '1',
        	'user_status' => '1',
        ]);
        Staff::create([
            'first_name' => 'Mosharrf',
            'last_name' => 'Hossain',
            'phone' => '01625474550',
            'gender' => 'male',
            'user_id' => $user->id,
            
        ]);
        $user = User::create([
            'email' => 'shatu@gmail.com',
            'password' => bcrypt('forum@qam'),
            'user_role' => '2',
            'user_status' => '1',
        ]);
        Staff::create([
            'first_name' => 'Arman',
            'last_name' => 'Shatu',
            'phone' => '01521208099',
            'gender' => 'male',
            'user_id' => $user->id,
            
        ]);
        $user = User::create([
            'email' => 'mohon.diit33@gmail.com',
            'password' => bcrypt('forum@qac'),
            'user_role' => '3',
            'user_status' => '1',
        ]);
        Staff::create([
            'first_name' => 'Irina',
            'last_name' => 'Alam',
            'phone' => '01521208077',
            'gender' => 'female',
            'user_id' => $user->id,
            
        ]);
        $user = User::create([
        	'email' => 'apu@gmail.com',
        	'password' => bcrypt('forum@qac'),
        	'user_role' => '3',
        	'user_status' => '1',
        ]);
        Staff::create([
            'first_name' => 'Apu',
            'last_name' => 'Hasan',
            'phone' => '01521208077',
            'gender' => 'female',
            'user_id' => $user->id,
            
        ]);

        $user = User::create([
        	'email' => 'mohon.diit65@gmail.com',
        	'password' => bcrypt('forum@stu'),
        	'user_role' => '5',
        	'user_status' => '1',
        ]);
        Student::create([
            'first_name' => 'Mehadi Hassan',
            'last_name' => 'Rudro',
            'phone' => '01521207099',
            'gender' => 'male',
            'user_id' => $user->id,
            'dep_id' => '1',
            
        ]);
        
    }
}
