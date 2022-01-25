<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;
use App\Http\Requests\SingleMovieRequest;


class SetApi extends Controller
{

    public function SingleMovie(SingleMovieRequest $request)
    {
        if ($request->get('original_id')) {
            $getapi = Film::where('original_id', $request->get('original_id'))->get();
        } elseif ($request->get('original_title')) {
            $getapi = Film::where('original_title', $request->get('original_title'))->get();
        } elseif ($request->get('title')) {
            $getapi = Film::where('title', $request->get('title'))->get();
        }

        $getfilms = json_encode($getapi);
        return $getfilms;
    }

    public function SetApiPagination()
    {
        $per_page = \Request::get('per_page') ?: 20;
        $api_films = Models\Film::with('categories')->paginate($per_page);
        $api_films_json = json_encode($api_films);
        return $api_films_json;
    }

    public function Search($find)
    {
        $findedfilms = Film::where(
            'title', 'LIKE', "%$find%")->get();
        $api_films_json = json_encode($findedfilms);
        return $api_films_json;
    }


}
