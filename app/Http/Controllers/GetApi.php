<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class GetApi extends Controller
{

    public function GetApi()
    {
        $response =
            Http::get('https://api.themoviedb.org/3/movie/550?api_key=5cf7a7c1c45476c43ef0d43846756912');

//        echo '</ul>';
        $result = array_values(json_decode($response, true));
        print_r($result);
//        foreach( $result as $results ) {
//            echo '<li>';
//            echo $results;
//            echo '</li>';
//        }
//        for ($i=0; $i< sizeof($result); $i++ )
//        {
//            echo $result[$i];
//
//        }
        return ($result);
    }
    public function bulkdata(Request $request)
    {

        $b=$request->input('data');
        $jsonarray =json_decode(json_encode($b),TRUE);
        foreach ($jsonarray as $key => $value)
        {

            foreach ($value as $a => $b)
            {

                $qry=DB::table("yotable")->insert([
                    'key1' => "$b",
                    'key2' => "$a"
                ]);
  }
        }

    }
}
