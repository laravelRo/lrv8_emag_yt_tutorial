<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            //cheia straina pentru tabelul orders cu constrangere
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            $table->unsignedBigInteger('product_id');

            $table->string('product_name');
            $table->unsignedDecimal('price');
            $table->unsignedInteger('qty');

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
        Schema::dropIfExists('order_items');
    }
}
