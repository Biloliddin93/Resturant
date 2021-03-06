<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use App\users_stats;
use App\users_history;
use Illuminate\Support\Facades\DB;

class povarcontroller extends Appcontroller
{
    public function index(Request $request)
    {
        if(!$this->checklogin($request)){return redirect("login");}
        return view("home")->with("type","povar");

    }
    public function gettaom()
    {
        $db = DB::table("zakazs")->leftJoin("taoms","taoms.id","=","zakazs.taom_id")->leftJoin("users","users.id","=","zakazs.user_id")->leftJoin("zakaz_stats","zakaz_stats.id","=","zakazs.zakaz_stats_id")->leftJoin("zakaz_stols","zakaz_stols.id","=","zakazs.zakaz_stol_id")->where("zakazs.zakaz_stats_id",1)->select("zakazs.*","taoms.taom_nomi","taoms.narxi","taoms.url","zakaz_stats.stats_name","zakaz_stols.stol_name")->orderBy('created_at', 'desc')->get();

   return $db;

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

    public function edit($str)
    {
        $db = DB::table('zakazs')
            ->where('id', $str)
            ->update(['zakaz_stats_id' => 3]);



        return redirect("povar/");

    }

    public function delete($str)
    {
        $db  = users::find($str);

        $db->delete();


        return redirect("/users");

    }
}
