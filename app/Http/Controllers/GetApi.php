<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class GetApi extends Controller
{
    public function GetApi()
    {
        $response =
            Http::get('https://api.themoviedb.org/3/movie/550?api_key=5cf7a7c1c45476c43ef0d43846756912');
           return json_decode($response);
    }
}
