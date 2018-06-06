<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\users;
use App\users_stats;
use App\users_history;
use Illuminate\Support\Facades\DB;
use Session;

class authcontroller extends Appcontroller
{
    public function index()
    {

        return view("home")->with("type","login");

    }
    public function auth(Request $request)
    {
        $model = User::all()
            ->where("login",$request->post("login"))
            ->where("password",md5($request->post("password")))
            ->first();



        Session::put("user_id",$model->id);
        Session::put("session_ids",Session::getId());
        Session::put("status",$model->stats_id);





        return redirect("/zakaz");

    }


}
