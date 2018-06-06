<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\users_stats;
use App\users_history;
use Illuminate\Support\Facades\DB;

class userscontroller extends Appcontroller
{
    public function index(Request $request)
    {
        $this->checklogin($request);   if(!$this->checklogin($request)){return redirect("login");} $db =DB::table("users")->leftJoin("users_stats","users_stats.id","=","users.stats_id")->select("users.*","users_stats.stats_name")->get();

$stats = users_stats::all();
        return view("home")->with("type","users")->with("db",$db)->with("stats",$stats);

    }

    public function edit_select($str)
    {
        $db =DB::table("users")->leftJoin("users_stats","users_stats.id","=","users.stats_id")->select("users.*","users_stats.stats_name")->where("users.id",$str)->get();
        $stats = users_stats::all();
        return view("home")->with("type","users_edit")->with("db",$db)->with("stats",$stats);

    }
    public function insert(Request $request)
    {
        $db  = new users();

        $db->fio = $request->input("fio");
        $db->login = $request->input("login");
        $db->password = md5($request->input("password"));
        $db->email = $request->input("email");
        $db->stats_id = $request->input("stats_id");

        $db->save();

        return redirect("/users");

    }

    public function edit(Request $request)
    {
        $db  = users::find($request->input("id"));

        $db->fio = $request->input("fio");
        $db->login = $request->input("login");

        if($request->exists("password"))
        {
            $db->password = md5($request->input("password"));
        }

        $db->email = $request->input("email");
        $db->stats_id = $request->input("stats_id");

        $db->save();

        return redirect("/users");

    }

    public function delete($str)
    {
        $db  = users::find($str);

        $db->delete();


        return redirect("/users");

    }
}
