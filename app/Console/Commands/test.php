<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    private $api_key="5cf7a7c1c45476c43ef0d43846756912";


    public function __construct()
    {
       parent::__construct();


    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $response =
            Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key=5cf7a7c1c45476c43ef0d43846756912");
        $response = (json_decode($response));
        $response = ($response->genres);

        foreach ($response as $value) {
            DB::table("category")->insert([
                'original_id' => "$value->id",
                'title' => "$value->name"
            ]);
        }

        $response =
            Http::get("https://api.themoviedb.org/3/movie/popular?api_key=5cf7a7c1c45476c43ef0d43846756912&page=1");
        $response = (json_decode($response));
        $response = ($response->results);
        foreach ($response as $value) {
            $films_genres = $value->genre_ids;
            foreach ($films_genres as $values) {
                DB::table("film_category")->insert([
                    'film_id' => $value->id,
                    'category_id' => $values
                ]);
            }
        }

        foreach ($response as $value) {
            if( isset($value->release_date)==FALSE)
                $value->release_date="FUTURE";
            if( isset($value->vote_average)==FALSE)
                $value->vote_average=0;
            DB::table("films")->insert([
                'original_id'=>$value->id,
                'adult' => $value->adult,
                'title' => "$value->title",
                'original_title' => "$value->original_title",
                'description' => "$value->overview",
                'release_date' => "$value->release_date",
                'poster_path' => "$value->poster_path",
                'language' => "$value->original_language",
                'popularity' => "$value->popularity",
                'vote_average' => "$value->vote_average"

            ]);
        }
    }
}
