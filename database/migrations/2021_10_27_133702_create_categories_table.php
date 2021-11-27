<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections');

            $table->string('slug');
            $table->string('name', 80);
            $table->string('title');
            $table->text('description')->nullable();

            $table->string('photo')->default('category.jpg')->nullable();
            $table->string('icon', 50)->nullable();

            $table->integer('position')->default(0)->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('promo')->default(false);

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

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
        Schema::dropIfExists('categories');
    }
}
