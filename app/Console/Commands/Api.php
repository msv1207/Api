<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Film;
use App\Models\FilmCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Api extends Command
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
       Film::query()->truncate();
       FilmCategory::query()->truncate();
       Category::query()->truncate();

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $response =
            Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key=$this->api_key");
        $response = (json_decode($response));
        $response = ($response->genres);
        foreach ($response as $value) {
            Category::updateOrCreate([
                'original_id' => "$value->id",
                'title' => "$value->name"
            ]);
        }
        for ($i=1;$i<101;$i++) {
            $response =
                Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$this->api_key&page=$i");
            $response = (json_decode($response));
            $response = ($response->results);

            foreach ($response as $value) {
                if( isset($value->release_date)==FALSE)
                    $value->release_date="FUTURE";
                if( isset($value->vote_average)==FALSE)
                    $value->vote_average=0;
                Film::updateOrCreate([
                    'original_id'=>$value->id,
                    'adult' => $value->adult,
                    'title' => "$value->title",

                    'original_title' => "$value->original_title",
                    'description' => "$value->overview",
                    'release_date' => "$value->release_date",
                    'poster_path' => "$value->poster_path",
                    'language' => "$value->original_language",
                    'popularity' => "$value->popularity",
                    'vote_average' => "$value->vote_average",
                    'budget'=>"$value->vote_average"

                ]);
                foreach ($value->genre_ids as $genre_id)
                {
                    FilmCategory::updateOrCreate([
                        'film_id'=> $value->id,
                        'category_id'=>$genre_id
                    ]);
                }

            }
        }
        echo "you get DB";
        return 0;
    }
}
