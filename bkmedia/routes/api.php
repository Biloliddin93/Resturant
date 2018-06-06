<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/taom/{srt}","zakazcontroller@taomlar");
Route::get("/gettaom/{srt}","zakazcontroller@getidtaom");
Route::get("/order/{srt}/{strx}","zakazcontroller@myorder");
Route::get("/order/{srt}/{strx}/{strf}","zakazcontroller@myorder");
Route::get("/povar","povarcontroller@gettaom");
