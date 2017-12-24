<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebController extends Controller
{
    public function __construct(){
        View::share('title',"网站标题1");
    }

    public function index(){

        $news=[['title1'=>"标题1","id"=>"1"],['title1'=>"标题2","id"=>"2"],['title1'=>"标题3","id"=>"3"]];
        return view("base",["news"=>$news]);
    }
    public function about(){

        $news=[['title1'=>"标题1","id"=>"1"],['title1'=>"标题2","id"=>"2"],['title1'=>"标题3","id"=>"3"]];
        return view("about1",["news"=>$news]);
    }
    public function news(){

    }
}
