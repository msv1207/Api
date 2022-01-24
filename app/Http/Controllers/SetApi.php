<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;

class SetApi extends Controller
{

    public function SetApiPagination() {
        $per_page = \Request::get('per_page') ?: 20;
        $api_films  = Models\Film::paginate($per_page);
        $api_films_json  = json_encode($api_films);
        return $api_films_json;

    }

    public function Search($find)
    {
       $customer = Film::all()->where('title', 'LIKE', "%$find%")->category();
            ->orWhere('original_title', 'LIKE', "%$find%")
    }

}
