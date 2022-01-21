<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Films extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('original_title');
            $table->longtext('description');
            $table->date('release_date')->default("12.07.2003");
            $table->text('poster_path');
            $table->string('language');
            $table->float('popularity');
            $table->float('vote_average');
            $table->boolean('adult');
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
        Schema::dropIfExists('films');

    }
}
