<?php

use Illuminate\Database\Seeder;
use App\User;
// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
//        \App\User::create([
//            'email' => 'abc@example.com',
//            'name' => 'abc',
//            'password' => Hash::make('qwerty'),
//        ]);
        \App\User::create([
            'email' => 'xyz@example.com',
            'name' => 'xyz',
            'password' => Hash::make('qwerty'),
        ]);
    }
}
