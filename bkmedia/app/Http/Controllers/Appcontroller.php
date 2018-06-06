<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\users;
use App\users_stats;
use App\users_history;
use Illuminate\Support\Facades\DB;
use Session;

class Appcontroller extends Controller
{

    public function checklogin(Request $request)
    {
        Session::start();


            if(Session::isValidId(Session::get("session_ids")))
            {

                return true;
            }
            else
            {
                return false;
            }




    }

    public function checkadmin(Request $request)
    {
        if(Session::get("status")=="1")
        {
            return true;
        }
        else
        {
           return false;
        }

    }

    public function checkpovar(Request $request)
    {
        if(Session::get("status")=="2")
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public function checkofitsiant(Request $request)
    {
        if(Session::get("status")=="3")
        {
            return true;
        }
        else
        {
            return false;
        }

    }


}
