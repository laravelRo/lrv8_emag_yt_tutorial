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
            $table->id();

            $table->foreignId('user_id')->constrained('users');

            $table->string('name', 150);
            $table->string('city', 70);
            $table->string('address');
            $table->string('phone', 150)->nullable();

            $table->datetime('approved_at')->nullable();
            $table->datetime('payed_at')->nullable();
            $table->datetime('recivied_at')->nullable();

            $table->unsignedDecimal('shipping_cost')->default(50);

            $table->string('observation', 500)->nullable();


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
