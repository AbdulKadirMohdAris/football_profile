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

Route::get('/', 'ProfilesController@index');
Route::get('create/profile', 'ProfilesController@create');
Route::post('create/profile', 'ProfilesController@store');
Route::get('edit/profile/{profiles}', 'ProfilesController@edit');
Route::post('edit/profile/{profiles}', 'ProfilesController@update');
Route::get('show/profile/{profiles}', 'ProfilesController@show');
Route::get('delete/profile/{profiles}', 'ProfilesController@destroy');