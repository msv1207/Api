<?php

use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\SetApi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetApi;
Auth:
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//Route::prefix("/api/v1")->group(function () {
//    Route::get("/search={find}", [SetApi::class, 'Search'])->middleware('auth:api');
//    Route::get("/films", [SetApi::class, 'SetApiPagination'])->middleware('auth:api');
//    Route::get("/film={id}", [SetApi::class, 'SingleMovie'])->middleware('auth:api');
//    Route::get("/sort_by={sort_by}", [SetApi::class, 'Sorting'])->middleware('auth:api');
//});
Route::prefix("/api/v1")->group(function () {
    Route::get("/search", [SetApi::class, 'Search']);
    Route::get("/films", [SetApi::class, 'SetApiPagination']);
    Route::get("/film", [SetApi::class, 'SingleMovie']);
    Route::get("/sort", [SetApi::class, 'Sorting']);
    Route::get("/filter", [SetApi::class, 'filter']);

});
//Route::post('login', [ 'as' => 'login', 'uses' => 'LoginController@do']);




