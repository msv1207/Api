<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetApi;
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
Route::get("/{film_id}", [GetApi::class, 'GetApi']);
//Route::get('/', [GetApi::class, 'GetApi']);
Route::get('/search/{findgenre}', [GetApi::class, 'SearchGenres']);
Route::get('/api/films', [\App\Http\Controllers\SetApi::class, 'setapiurl']);
