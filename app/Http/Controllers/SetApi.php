<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;

class SetApi extends Controller
{

    public function setapiurl() {

        $api_films  = Models\Film::paginate(1);
        $api_films_json  = json_encode($api_films);
        return $api_films_json;

    }

}
