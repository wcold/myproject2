<?php
Route::group(["prefix"=>"redis"],function (){
    Route::get("/index","RedisController@index");
});