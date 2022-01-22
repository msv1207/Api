<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;

class SetApi extends Controller
{

  public function setapiurl() {


      $api = DB::table('films')->get()->toJson();
      dd($api);
  }

}
