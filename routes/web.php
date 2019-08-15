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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'mbs','middleware'=>'auth'], function() {
Route::get('profile/create', 'ProfileController@add');
Route::post('profile/create', 'ProfileController@create');
Route::get('profile/edit', 'ProfileController@edit');
Route::post('profile/edit', 'ProfileController@update');
Route::get('profile/myprofile', 'ProfileController@description')->name('myprofile');;
});
