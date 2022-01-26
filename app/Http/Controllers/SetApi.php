<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Barryvdh\Debugbar\Facades\Debugbar;
use function PHPUnit\Framework\returnArgument;
use App\Models\Category;



class SetApi extends Controller
{


 
    public function SingleMovie(Request $request)
    {
            $get_api = Film::with('categories')->findOrFail($request->id)->get();
       if ($request->get('original_id')) {
            $getapi = Film::where('original_id', $request->get('original_id'))->get();
        } elseif ($request->get('original_title')) {
            $getapi = Film::where('original_title', $request->get('original_title'))->get();
        } elseif ($request->get('title')) {
            $getapi = Film::where('title', $request->get('title'))->get();
        }

        return $get_api;

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
    public function filter(Request $request)
    {
        $filter=$request->ganres;
        $date=$request->date;
        $finded_films = Category::with('films')
            ->where('title', '=', "%$filter%")->get();
        $finded_films = Film::with('categories')
            ->where('release_date', 'like', "%$date%")->get();
        return($finded_films);

    }
}
