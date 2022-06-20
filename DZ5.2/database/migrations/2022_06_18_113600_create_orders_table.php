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
            $table->integer('orderNumber')->primary();
            $table->dateTime('orderDate');
            $table->dateTime('requiredDate');
            $table->dateTime('shippedDate')->nullable();
            $table->string('status', 15);
            $table->text('comments')->nullable();
            $table->integer('customerNumber');
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
