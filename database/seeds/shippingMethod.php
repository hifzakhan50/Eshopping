<?php

use Illuminate\Database\Seeder;

class shippingMethod extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shipping_method')->insert([
            'id' => 1,
            'name' => 'TCS',
            'price'=>  250,
        ]);
    }
}
