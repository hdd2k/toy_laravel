<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {

//        Note : Used for random seeding logic

        // clear DB
        DB::table('users')->delete();

        // Create 1 user
        $user_1 = \App\User::create(array(
            'name' => 'user_1',
            'email' => 'user@example.com',
            'password' => bcrypt('password')
        ));

    }
}