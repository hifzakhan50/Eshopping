<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BillingAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_address', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full-name');
            $table->string('mobile#');
            $table->string('email');
            $table->float('house#');
            $table->float('street#');
            $table->string('province');
            $table->string('postalcode');
            $table->float('country');
            $table->string('addresstype');
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
        //
    }
}
