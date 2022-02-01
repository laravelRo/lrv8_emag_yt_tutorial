<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->references('id')->on('sections')->constrained();
            $table->unsignedBigInteger('brand_id')->nullable();

            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('excerpt', 700)->nullable();
            $table->text('presentation')->nullable();
            $table->string('photo')->nullable()->default('product.jpg');
            $table->integer('views')->default(0);

            $table->unsignedDecimal('price')->default(0);
            $table->unsignedDecimal('discount')->default(0);
            $table->integer('stock')->default(100);

            $table->integer('position')->default(0)->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('promo')->default(false);

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();


            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
