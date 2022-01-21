<?php

namespace App\Http\Controllers;

use App\Models\ApiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models;


class GetApi extends Controller
{
//    private $api_key="5cf7a7c1c45476c43ef0d43846756912";
    public function GetApi()
    {

    }
    public function searchCustomer($findcustomer)
    {
//        $customer = DB::table('films')->find("$findcustomer");
        $customer = DB::table('films')
            ->where('title', 'LIKE', "%$findcustomer%")
            ->orWhere('description', 'LIKE', "%$findcustomer%")
            ->get();
//        DB::table('films')->paginate(15);
        return $customer;
    }

}
