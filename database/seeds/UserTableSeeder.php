<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert user in database
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@eshopping.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT)
        ]);


    }
}
