<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_review', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating_value');
            $table->text('review_text')->nullable();
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('user_id');
            $table->foreign('product_id')->references('id')->on('product');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('_review');
    }
};
