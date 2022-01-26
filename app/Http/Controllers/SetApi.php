<?php

namespace App\Http\Controllers;

use App\Models\Film;
//use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;
use Barryvdh\Debugbar\Facades\Debugbar;
use function PHPUnit\Framework\returnArgument;


class SetApi extends Controller
{

    public function SingleMovie($id)
    {
        $get_api = Film::with('categories')->findOrFail($id);
        $get_films  = json_encode($get_api);
        return $get_api;
    }
    public function SetApiPagination(Request $request) {

        $per_page =$request->get('per_page') ?: 20;
        $api_films  = Film::with("categories")
            ->paginate($per_page);
        $api_films_json  = json_encode($api_films);
        return $api_films;
    }
    public function Search($find)
    {
        $finded_films = dd(Film::with('categories')->where(
            'title', 'LIKE', "%$find%")->get());
        $api_films_json  = ($finded_films);
        return  $api_films_json;
    }

    public function Sorting($sort_by='release_date')
    {
        $query = Film::query();
        $query->when($sort_by == "title", function ($q) {
            return (json_encode($q->orderBy("title")));

        });
        $query->when($sort_by == 'original_title', function ($q) {
            return (json_encode($q->orderBy('original_title')->get()));
        });
        $query->when($sort_by == 'release_date', function ($q) {
            return (json_encode($q->orderBy('release_date')->get()));
        });
    }
}
