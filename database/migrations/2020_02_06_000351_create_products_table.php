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
            $table->string('name');
            $table->string('distributor');
            $table->unsignedbigInteger('category_id');         
            $table->integer('count_storage');

            $table->integer('price');
            $table->integer('sale');
            $table->string('first_image');
            $table->string('itemvideo')->nullable();
            $table->string('short_desc');
            $table->string('large_desc');       
            $table->string('weight');
            $table->boolean('pro')->default(0);
            $table->boolean('top')->default(0);
            $table->timestamps();

            $table->foreign('count_storage')->references('id')->on('products');
            $table->foreign('category_id')->references('id')->on('products');
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
