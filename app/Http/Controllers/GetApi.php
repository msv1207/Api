<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use App\Models\FilmCategory;
use App\Models\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class GetApi extends Controller
{
//    private $api_key="5cf7a7c1c45476c43ef0d43846756912";

    public function GetApi($film_id)
    {
        $test=Film::findOrFail($film_id)->categories()->get();
        return  dd($test);
    }

    public function SearchGenres($findgenre)
    {
        $test=Category::findOrFail($findgenre)->films()->get();
        return  dd($test);
    }

}
