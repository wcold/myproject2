<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::get('/about', function () {
    return view('about');
})->name('a');

Route::get('/content/id/{id}/page/{page}', function ($id,$page) {
    return $id."<br>".$page;
})->where(['id'=>'[0-9]+','page'=>'[a-z]+']);

Route::get('/news', "newsController@getNews");

Route::get('/article/{age}', "newsController@getNews")->middleware('checkage');

Route::resource('photos','PhotoController');

Route::resource('msg','MsgController');*/
/*Route::get('/about', function () {
    return view('about');
})->name('a');*/
/*
Route::get('/test/{age}',"TestController@getTest");
Route::get('/setsession',"TestController@setSession");
Route::get('/getsession',"TestController@getSession");
Route::get('/delsession',"TestController@delSession");*/
//include 'web1.php';
include 'admin.php';
include 'car.php';
include 'redis.php';
Route::get('/','ProductController@products');
Route::get('/products','ProductController@products');
Route::get('/msglist','MsgController@index');
Route::get('/msg','MsgController@create');
Route::post('/msg','MsgController@store');
Route::resource('/reply','ReplyController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
