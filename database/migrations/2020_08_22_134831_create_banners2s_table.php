<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanners2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners2s', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('text_style');
            $table->string('sort_order');
            $table->string('content');
            $table->string('link');
            $table->string('status')->default('1');
            $table->string('image');
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
        Schema::dropIfExists('banners2s');
    }
}
