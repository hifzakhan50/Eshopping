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
            $table->unsignedBigInteger('Order_id');
            $table->unsignedBigInteger('Product_id');
            $table->string('OrderNumber');
            $table->float('Price');
            $table->integer('Quantity');
            $table->integer('Discount');
            $table->float('Total');
            $table->unsignedBigInteger('IDSKU');
            $table->string('Size');
            $table->string('Color');
            $table->string('Fullfilled');
            $table->date('ShipDate');
            $table->unsignedBigInteger('OrderDetailID');
            $table->date('BillDate');

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
