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

Route::get("/api/", [GetApi::class, 'GetApi']);
Route::get('/api/v1/search={find}', [\App\Http\Controllers\SetApi::class, 'Search']);
Route::get('/api/v1/films', [\App\Http\Controllers\SetApi::class, 'SetApiPagination']);
Route::get('/api/v1/movie', [\App\Http\Controllers\SetApi::class, 'SingleMovie']);


