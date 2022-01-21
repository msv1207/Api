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
            $table->string('original_title')->nullable();
            $table->longtext('description')->nullable();
            $table->date('release_date')->nullable();
            $table->text('poster_path')->nullable();
            $table->string('language');
            $table->float('popularity');
            $table->float('vote_average')->nullable();
            $table->boolean('adult');
            $table->string('budget')->nullable();
            $table->string('revenue')->nullable();
            $table->bigInteger('run_time');
            $table->string('production_countries');
            $table->string('original_id');
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
