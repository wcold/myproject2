<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index(){
        Redis::setnx("name",0);
        for($i=0;$i<15;$i++){
            Redis::incr("name");
            sleep(1);
        }
        echo Redis::get("name");
    }
}
