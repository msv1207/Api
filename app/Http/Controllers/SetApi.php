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
        $finded_films = Film::with('categories')->where(
            'title', 'LIKE', "%$find%")->get();
        return  $finded_films;
    }

//    public function Sorting($sort_by='release_date', $sort='desc')
    public function Sorting(Request $request)
    {
        $_REQUEST=$request;
        if(isset($_REQUEST->sort)==FALSE)
            $_REQUEST->sort="desc";
        if(isset($_REQUEST->sort_by)==FALSE)
            $_REQUEST->sort_by="release_date";
        $sort_by=$_REQUEST->sort_by;
        $query = Film::query();
        $query->when($sort_by == "title", function ($q) {
            $q->orderBy("title", $_REQUEST->sort);
        });
        $query->when($sort_by == 'original_title', function ($q, $sort) {
            $q->orderBy('original_title', $_REQUEST->sort);
        });
        $query->when($sort_by == 'release_date', function ($q, $sort) {
            $q->orderBy('release_date', $_REQUEST->sort);
        });
        return $query->paginate(20);
    }
}
