<?php
Route::group(["prefix"=>"car"],function (){
   Route::get("/add/{id}/","CarController@add");
   Route::get("/adcr/{id}/","CarController@adcr");
   Route::get("/show","CarController@show");
   Route::get("/decr/{id}","CarController@decr");
   Route::get("/del/{id}","CarController@del");
   Route::get("/clear","CarController@clear");
   Route::get("/pay/{id}","CarController@pay");
   Route::get("/allpay","CarController@allpay");
   Route::get("/zpay/{id}","CarController@zpay");
});