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
            $response = ($response->results);

        foreach ($response as $value) {

                DB::table("category")->insert([
                    'original_id' => "$value->id",
                    'title' => "$value->name"
                ]);
            }
        for ($i=1;$i<100;$i++) {
            $response =
                Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$this->api_key&page=$i");
            $response = (json_decode($response));
            $response = ($response->results);
            foreach ($response as $value) {
//                var_dump($value);
//dd($value);
                DB::table("films")->insert([
                    'adult' => $value->adult,
                    'title' => "$value->original_title",
                    'original_title' => "$value->original_title",
                    'description' => "$value->overview",
//                    'release_date' => "$value->release_date",
                    'poster_path' => "$value->poster_path",
                    'language' => "$value->original_language",
                    'popularity' => "$value->popularity",
                    'vote_average' => "$value->vote_average",
                ]);
            }
        }
        return 0;
    }
}
