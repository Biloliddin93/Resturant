<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taom as taoms;
use App\taom_size;
use App\taom_type;
use Illuminate\Support\Facades\DB;

class taomcontroller extends Appcontroller
{
    public function index(Request $request)
    {
        if(!$this->checklogin($request)){return redirect("login");}
        $db =DB::table("taoms")->leftJoin("taom_sizes","taom_sizes.id","=","taoms.size_id")->leftJoin("taom_types","taom_types.id","=","taoms.type_id")->select("taoms.*","taom_types.type_name","taom_sizes.size_name")->get();

$type  = taom_type::all();
$size  = taom_size::all();
        return view("home")->with("type","taom")->with("db",$db)->with("types",$type)->with("size",$size);

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
        $db  = new taoms();

        $db->taom_nomi = $request->input("taom_nomi");

        $file = $request->file('url');

        $flname = date("HHMMSSss").$file->getClientOriginalExtension();

        //Move Uploaded File
        $destinationPath = 'uploads';
        $file->move($destinationPath,$flname);

        $db->url = $flname;
        $db->narxi = $request->input("narxi");
        $db->type_id = $request->input("type_id");
        $db->size_id = $request->input("size_id");

        $db->save();

        return redirect("/taom");

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
