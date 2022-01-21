<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;


class GetApi extends Controller
{
    private $api_key="5cf7a7c1c45476c43ef0d43846756912";
    public function GetApi()
    {

        $response =
            Http::get("https://api.themoviedb.org/3/genre/movie/list?api_key=5cf7a7c1c45476c43ef0d43846756912");
        $response = (json_decode($response));
        $response = ($response->genres);

        foreach ($response as $value) {
            DB::table("category")->insert([
                'original_id' => "$value->id",
                'title' => "$value->name"
            ]);
        }
        for ($i=1;$i<100;$i++) {
            $response =
                Http::get("https://api.themoviedb.org/3/movie/popular?api_key=$this->api_key&page=$i");
            $response = (json_decode($response));
            $response = ($response->results);
//            dd($response);
            foreach ($response as $value) {
//                var_dump($value);
var_dump($value);
                DB::table("films")->insert([
                    'original_id'=>$value->id,
                    'adult' => $value->adult,
                    'title' => "$value->title",
                    'original_title' => "$value->original_title",
                    'description' => "$value->overview",
                    'release_date' => "$value->release_date",
                    'poster_path' => "$value->poster_path",
                    'language' => "$value->original_language",
                    'popularity' => "$value->popularity",
                    'vote_average' => "$value->vote_average",
//                    'budget'=>"$value->vote_average"

                ]);
            }
        }
    }
    public function searchCustomer($findcustomer)
    {
//        $customer = DB::table('films')->find("$findcustomer");
        $customer = DB::table('films')
            ->where('title', 'LIKE', "%$findcustomer%")
            ->orWhere('description', 'LIKE', "%$findcustomer%")
            ->get();
        $customer=ApiModel::all();
//        DB::table('films')->paginate(15);
        return $customer;
    }

}
