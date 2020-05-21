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
            $table->unsignedBigInteger('Customer_id');
            $table->string('OrderNumber');
            $table->unsignedBigInteger('PaymentID');
            $table->date('OrderDate');
            $table->date('ShipDate');
            $table->date('RequiredDate');
            $table->unsignedBigInteger('ShipperID');
            $table->string('Freight');
            $table->unsignedBigInteger('SalesTax');
            $table->string('TransactStatus');
            $table->string('Fullfilled');
            $table->string('Deleted');
            $table->string('Paid');
            $table->date('PaymentDate');
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
