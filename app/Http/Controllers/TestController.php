<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    /*function __construct()
    {
        $this->middleware("checkage1");
    }*/

    public function getTest(){
        //$this->middleware("checkage1");
        echo "1";
    }
    public function setSession(){
        //Session(["userName"=>"张三","password"=>"123456"]);
        Session()->flash("userName","张三");
    }
    public function getSession(){
        /*echo Session("userName","fefault");
        echo "<br>";
        echo Session("password");*/
        echo Session()->get("userName");
    }
    public function delSession(){
        //Session::forget("userName");
        Session::flush();
    }
}
