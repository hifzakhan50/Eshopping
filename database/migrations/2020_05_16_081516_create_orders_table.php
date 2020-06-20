<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_profile_id');
            $table->string('order_number');
            $table->unsignedBigInteger('payment_id');
            $table->date('order_date');
            $table->date('ship_date');
            $table->date('required_date');
            $table->unsignedBigInteger('shipper_id');
            $table->string('freight');
            $table->unsignedBigInteger('sales_tax');
            $table->string('transact_status');
            $table->string('fullfilled');
            $table->string('deleted');
            $table->string('paid');
            $table->date('payment_date');
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
        Schema::dropIfExists('orders');
    }
}
