<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product2s', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('product_name');
            $table->string('product_code');
            $table->longtext('product_description');
            $table->string('product_price');
            $table->string('image');
            $table->string('status')->default('1');
            $table->string('featured_products')->default('1');
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
        Schema::dropIfExists('product2s');
    }
}
