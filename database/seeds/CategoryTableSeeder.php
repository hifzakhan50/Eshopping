<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'Women Fashion',
            'description'=>  'Everything including women fashion',
        ]);
        DB::table('category')->insert([
            'name' => 'Health & Beauty',
            'description'=>  'All the health and beauty products',
        ]);
        DB::table('category')->insert([
            'name' => 'Electronic Devices',
            'description'=>  'All the eclectronic appliences and gadgets',
        ]);
        DB::table('category')->insert([
            'name' => 'Home Accessories and Maintainence',
            'description'=>  'Home furnishing and maintainence products',
        ]);
    }
}
