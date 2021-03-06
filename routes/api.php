<?php

use App\Http\Controllers\SetApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::prefix("/v1")->group(function () {
    Route::get("/search", [SetApi::class, 'search'])->middleware('auth:sanctum');
    Route::get("/films", [SetApi::class, 'setApiPagination'])->middleware('auth:sanctum');
    Route::get("/sort", [SetApi::class, 'sorting'])->middleware('auth:sanctum');
    Route::get("/film", [SetApi::class, 'singleMovie'])->middleware('auth:sanctum');
    Route::get("/filter", [SetApi::class, 'filter'])->middleware('auth:sanctum');
});
