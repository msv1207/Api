<?php

namespace App\Http\Controllers;

use App\Http\Requests\SingleMovieRequest;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Category;


class SetApi extends Controller
{
    public function SingleMovie(SingleMovieRequest $request)
    {
        if (isset ($request->original_id))
            $get_api = Film::with("categories")->where('original_id', $request->original_id);
         elseif (isset ($request->original_title))
            $get_api = Film::with("categories")->where('original_title', $request->original_title);
         elseif (isset( $request->title))
            $get_api = Film::with("categories")->where('title', $request->get('title'));
         return $get_api->get();
    }
    public function SetApiPagination(Request $request) {

        $per_page =$request->get('per_page') ?: 20;
        $api_films  = Film::with("categories")
            ->paginate($per_page);
        return $api_films;
    }
    public function Search(Request $request)
    {
        $find=$request->find;
        $finded_films = Film::with('categories')->where(
            'title', 'LIKE', "%$find%")->get();
        return  $finded_films;
    }

    public function Sorting(Request $request)
    {
        if(isset($_REQUEST["sort"])==FALSE)
            $_REQUEST["sort"]="desc";
        if(isset($request->sort_by)==FALSE)
            $request->sort_by="release_date";
        $sort_by=$request->sort_by;
        $query = Film::query();
        $query->when($sort_by == "title", function ($q) {
            $q->orderBy("title", $_REQUEST["sort"]);
        });
        $query->when($sort_by == 'original_title', function ($q) {
            $q->orderBy('original_title', $_REQUEST["sort"]);
        });
        $query->when($sort_by == 'release_date', function ($q) {
            $q->orderBy('release_date', $_REQUEST["sort"]);
        });
        return $query->paginate(20);
    }
    public function Filter(Request $request)
    {
        if (isset($request->ganres)) {
            $filter = $request->ganres;
            $finded_films = Category::with('films')
                ->where('title', '=', "$filter");
        }
        elseif(isset($request->date)) {
            $date = $request->date;
            $finded_films = Film::with('categories')
                ->whereDate('release_date', 'LIKE', "%$date%");
        }
        return $finded_films->get();

    }
}
