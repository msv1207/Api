<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;

class SetApi extends Controller
{

    public function SingleMovie($id)
    {
        $getapi = Film::with('categories')->findOrFail($id);
        $getfilms  = json_decode($getapi);
        dd($getfilms);
    }

    public function SetApiPagination() {
        $per_page = \Request::get('per_page') ?: 20;
        $api_films  = Models\Film::with('categories')->paginate($per_page);
        $api_films_json  = json_encode($api_films);
        return $api_films_json;
    }

    public function Search($find)
    {
        $findedfilms = Film::where(
            'title', 'LIKE', "%$find%")->get();
        $api_films_json  = json_encode($findedfilms);
        return  $api_films_json;
    }


//    public function GenreFiltering($find)
//    {
//        $findgenre = Film::where('title', 'LIKE', "%$find%")
//            ->where('categories', $find)
//            ->get();
//        $api_films_genre_json  = json_encode($findgenre);
//        return  $api_films_genre_json;
//    }

}
