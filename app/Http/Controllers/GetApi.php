<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Film;
use App\Models\FilmCategory;
use App\Models\test;
use App\Models\User;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class GetApi extends Controller
{
    private $api_key="5cf7a7c1c45476c43ef0d43846756912";

    public function SearchCustomer($findcustomer)
    {
//        $customer = Film::all()->where('title', 'LIKE', "%$findcustomer%")->category();
//            ->orWhere('description', 'LIKE', "%$findcustomer%")

//$customer=FilmCategory::all()->film();
//        $test=Category::findOrFail(12)->films()->get();
        $test=Film::findOrFail(12)->categories()->get()[1];
//        foreach ($test->title as $tet)
//           dump( $tet);
//        $test=FilmCategory::findOrFail(1)->films();
         dd(($test));


//for ($i=1; $i<1000;$i++) {
//    $categories = FilmCategory::;
// FilmCategory::a
//            ->films()->get();
//    dump($categories);
//}
//        foreach($categories as $category) {
//            dd($category);
//            dump($category->title);
//        }

//        return dump( $categories);
//            FilmCategory::all()->title;
    }



//    public function Sort()
//    {
//        $Sorted=Film::sortBy("");
//    }
}
