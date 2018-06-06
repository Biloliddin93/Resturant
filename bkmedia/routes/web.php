<?php

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

Route::get('/', function () {
    return view('home')->with("type","login");
});




        //users
        Route::get("users","userscontroller@index");
        Route::get("users_e/{str}","userscontroller@edit_select");
        Route::post("users_add","userscontroller@insert");
        Route::post("users_edit","userscontroller@edit");
        Route::get("deleteusers/{str}","userscontroller@delete");


//taom


    Route::get("taom","taomcontroller@index")->name("taom");
    Route::get("taom_e/{str}","taomcontroller@edit_select");
    Route::post("taom_add","taomcontroller@insert");
    Route::post("taom_edit","taomcontroller@edit");
    Route::get("deletetaom/{str}","taomcontroller@delete");

//zakaz


    Route::get("zakaz","zakazcontroller@index");
    Route::get("endcheck/{str}","zakazcontroller@changestats");
    Route::get("myorder","zakazcontroller@myindex");
    Route::get("check/{str}","zakazcontroller@getcheck");
    Route::get("taom_e/{str}","taomcontroller@edit_select");
    Route::post("zakaz_add","zakazcontroller@insert");
    Route::post("taom_edit","taomcontroller@edit");
    Route::get("deletetaom/{str}","taomcontroller@delete");



//povar
    Route::get("povar","povarcontroller@index");

    Route::post("auth","authcontroller@auth");
    Route::get("povarready/{str}","povarcontroller@edit");




Route::get("login","authcontroller@index")->name("login");




