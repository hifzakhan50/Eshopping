<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->string('order_number');
            $table->float('price');
            $table->integer('quantity');
            $table->integer('discount');
            $table->float('total');
            $table->string('size');
            $table->string('color');
            $table->string('fullfilled');
            $table->date('shipping_date');
            $table->unsignedBigInteger('order_detail_id');
            $table->date('bill_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
