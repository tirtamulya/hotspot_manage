<?php

use App\Hotspot;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = new User();
    	$user->name = 'Tirta Mulya';
    	$user->email = 'tmulya@gmail.com';
    	$user->password = bcrypt('1234567890');
    	$user->hotspot_id = Hotspot::first()->hotspot_id;
    	$user->save();
    }
}
