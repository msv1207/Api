<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;


class GetApi extends Controller
{
    public function GetApi()
    {
        $response =
            Http::get('https://api.themoviedb.org/3/movie/popular?api_key=5cf7a7c1c45476c43ef0d43846756912');
        $response=(json_decode($response));

        $response=($response->results);
        foreach ($response as $value ) {

            DB::table("films")->insert([
                'adult' => TRUE,
                'title' => "$value->original_title",
                'original_title' => "$value->original_title",
                'description' => "$value->overview",
                'release_date' => "$value->release_date",
                'poster_path' => "$value->poster_path",
                'language' => "$value->original_language",
                'popularity' => "$value->popularity",
                'vote_average' => "$value->vote_average",
            ]);
        }
    }

}
