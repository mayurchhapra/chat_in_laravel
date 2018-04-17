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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
//Route::resource('/chat','ChatController');

Route::get('/chat',"ChatController@index");
Route::post('/chat/store',"ChatController@store");

Route::post('/chat/save/','ChatController@create');

Route::get('/chat/getChat/','ChatController@getChat')->name('getChat');
