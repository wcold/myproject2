<?php
/*Route::get('/',"WebController@index");
Route::get('/about1',"WebController@about");
Route::get('/news',"WebController@news");*/

Route::get('/',"News1Controller@index");
Route::get('/show/{news1}',"News1Controller@show");
Route::get('/news',"News1Controller@news");

Route::get('/phone',"PhoneController@index");