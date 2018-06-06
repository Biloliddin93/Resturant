<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\zakaz;
use App\zakaz_stol;
use App\zakaz_stats;
use Illuminate\Support\Facades\DB;

class zakazcontroller extends Appcontroller
{
    public function index(Request $request)
    {
        if(!$this->checklogin($request)){return redirect("login");}
        $ss= zakaz_stol::all();
                return view("home")->with("type","zakaz")->with("stol",$ss);

    }

    public function myindex()
    {
        $ss= zakaz_stol::all();
        return view("home")->with("type","zakaz_one")->with("stol",$ss);

    }
    public function getcheck($stol_id)
    {
        $user_idx=1;
        $db = DB::table("zakazs")->leftJoin("taoms","taoms.id","=","zakazs.taom_id")->leftJoin("users","users.id","=","zakazs.user_id")->leftJoin("zakaz_stats","zakaz_stats.id","=","zakazs.zakaz_stats_id")->leftJoin("zakaz_stols","zakaz_stols.id","=","zakazs.zakaz_stol_id")->where("zakazs.user_id","=",$user_idx)->where("zakazs.zakaz_stol_id",$stol_id)->select("zakazs.*","taoms.taom_nomi","taoms.narxi","taoms.url","zakaz_stats.stats_name","zakaz_stols.stol_name")->get();


        $totals =0;
        foreach ($db as $vls)
        {
            $totals +=$vls->narxi;
        }

        return view("check")->with("tab",$db)->with("totals",$totals)->with("stol_id",$stol_id);

    }
    public function myorder($stol_id,$stats,$statsor = null)
    {
        $db ="";
        $user_idx = 1;
        if($stol_id !="all")
        {
            if($statsor!=null)
            {
                $db = DB::table("zakazs")->leftJoin("taoms","taoms.id","=","zakazs.taom_id")->leftJoin("users","users.id","=","zakazs.user_id")->leftJoin("zakaz_stats","zakaz_stats.id","=","zakazs.zakaz_stats_id")->leftJoin("zakaz_stols","zakaz_stols.id","=","zakazs.zakaz_stol_id")->where("zakazs.user_id","=",$user_idx)->where("zakazs.zakaz_stol_id","=",$stol_id)->where("zakazs.zakaz_stats_id",$stats)->orWhere("zakazs.zakaz_stats_id",$statsor)->select("zakazs.*","taoms.taom_nomi","taoms.narxi","taoms.url","zakaz_stats.stats_name","zakaz_stols.stol_name")->get();

            }
            else
            {
                $db = DB::table("zakazs")->leftJoin("taoms","taoms.id","=","zakazs.taom_id")->leftJoin("users","users.id","=","zakazs.user_id")->leftJoin("zakaz_stats","zakaz_stats.id","=","zakazs.zakaz_stats_id")->leftJoin("zakaz_stols","zakaz_stols.id","=","zakazs.zakaz_stol_id")->where("zakazs.user_id","=",$user_idx)->where("zakazs.zakaz_stol_id","=",$stol_id)->where("zakazs.zakaz_stats_id",$stats)->select("zakazs.*","taoms.taom_nomi","taoms.narxi","taoms.url","zakaz_stats.stats_name","zakaz_stols.stol_name")->get();

            }

        }
        else
        {
            if($statsor!=null) {
                $db = DB::table("zakazs")->leftJoin("taoms","taoms.id","=","zakazs.taom_id")->leftJoin("users","users.id","=","zakazs.user_id")->leftJoin("zakaz_stats","zakaz_stats.id","=","zakazs.zakaz_stats_id")->leftJoin("zakaz_stols","zakaz_stols.id","=","zakazs.zakaz_stol_id")->where("zakazs.user_id","=",$user_idx)->where("zakazs.zakaz_stats_id",$stats)->orWhere("zakazs.zakaz_stats_id",$statsor)->select("zakazs.*","taoms.taom_nomi","taoms.url","taoms.narxi","zakaz_stats.stats_name","zakaz_stols.stol_name")->get();

            }

            else{
                $db = DB::table("zakazs")->leftJoin("taoms","taoms.id","=","zakazs.taom_id")->leftJoin("users","users.id","=","zakazs.user_id")->leftJoin("zakaz_stats","zakaz_stats.id","=","zakazs.zakaz_stats_id")->leftJoin("zakaz_stols","zakaz_stols.id","=","zakazs.zakaz_stol_id")->where("zakazs.user_id","=",$user_idx)->where("zakazs.zakaz_stats_id",$stats)->select("zakazs.*","taoms.taom_nomi","taoms.url","taoms.narxi","zakaz_stats.stats_name","zakaz_stols.stol_name")->get();

            }

        }





        return $db;


    }



    public function  taomlar($str)
    {
        $db =DB::table("taoms")->leftJoin("taom_sizes","taom_sizes.id","=","taoms.size_id")->leftJoin("taom_types","taom_types.id","=","taoms.type_id")->select("taoms.*","taom_types.type_name","taom_sizes.size_name")->where("taoms.type_id",$str)->get();

        return $db;

    }
    public function  getidtaom($str)
    {
        $db =DB::table("taoms")->leftJoin("taom_sizes","taom_sizes.id","=","taoms.size_id")->leftJoin("taom_types","taom_types.id","=","taoms.type_id")->select("taoms.*","taom_types.type_name","taom_sizes.size_name")->where("taoms.id",$str)->take(1)->get();

        return $db;

    }



    public function edit_select($str)
    {
        $db =DB::table("taoms")->leftJoin("taom_sizes","taom_sizes.id","=","taoms.size_id")->leftJoin("taom_types","taom_types.id","=","taoms.type_id")->select("taoms.*","taom_types.type_name","taom_sizes.size_name")->where("taoms.id",$str)->get();
        $type  = taom_type::all();
        $size  = taom_size::all();

        return view("home")->with("type","taom_edit")->with("db",$db)->with("types",$type)->with("size",$size);

    }
    public function insert(Request $request)
    {
        $db  = new zakaz();

        $db->taom_id = $request->input("taom_id");

          $db->user_id =1;
        $db->qancha = $request->input("count");
        $db->zakaz_stats_id = 1;
        $db->zakaz_stol_id = $request->input("stol");

        $db->save();

        echo "ok";

    }
    public function changestats($str)
    {
        $db = DB::table('zakazs')
            ->where('zakaz_stol_id', $str)
            ->update(['zakaz_stats_id' =>3]);



        return redirect("myorder/");
    }

    public function edit(Request $request)
    {
        $db  = taoms::find($request->input("id"));
        $db->taom_nomi = $request->input("taom_nomi");



        if($request->hasFile("url"))
        {
            $file = $request->file('url');

            $flname = date("HHMMSSss").$file->getClientOriginalExtension();

            //Move Uploaded File
            $destinationPath = 'uploads';
            $file->move($destinationPath,$flname);

            $db->url = $flname;
        }

        $db->narxi = $request->input("narxi");
        $db->type_id = $request->input("type_id");
        $db->size_id = $request->input("size_id");

        $db->save();

        return redirect("/taom");

    }

    public function delete($str)
    {
        $db  = taoms::find($str);

        $db->delete();


        return redirect("/taom");

    }
}
