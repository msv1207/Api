<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FilmsHasCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('film_category', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('film_id');
//            $table->foreign('film_id')->references('id')->on('films');
            $table->foreignId('film_id');
//                ->constrained()
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
            $table->foreignId('category_id');
////                ->constrained()
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
//            $table->unsignedBigInteger('category_id');
//            $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('film_category');
    }
}
