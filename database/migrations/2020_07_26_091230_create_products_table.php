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
            $table->bigIncrements('id');
            $table->integer('categories_id');
            $table->integer('brands_id');
            $table->string('products_name')->unique();
            $table->string('slug')->nullable();
            $table->double('products_price');
            $table->text('products_short_desc')->nullable();
            $table->text('products_long_desc')->nullable();
            $table->string('products_image')->nullable();
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
