<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->unique();
            //domeniul de aplicabilitate: oricarei comenzi sau specific unor utilizatori, categorii sau branduri
            $table->tinyInteger('coupon_type')->default(1);
            //typul discountului: procente sau suma fixa
            $table->boolean('percent')->default(true);
            //valoarea couponului in procente sau suma fixa
            $table->decimal('value');
            //valoarea comenzii de la care se aplica couponul
            $table->decimal('amount')->default(0);
            $table->string('description', 500);

            //valabilitatea couponului
            $table->boolean('active')->default(true);
            $table->date('expired_at')->nullable();


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
        Schema::dropIfExists('coupons');
    }
}
