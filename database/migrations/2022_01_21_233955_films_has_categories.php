<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FilmsHasCategories extends Migration
{
    /**
     * Run the migrations.

     * @return void
     */
    public function up()
    {
        Schema::create('film_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('film_id');
            $table->foreignId('category_id');
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
