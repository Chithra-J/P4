<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/', 'WelcomeController@index');
Route::get('/parents/login', 'ParentsController@getLogin');
Route::get('/parents/create', 'ParentsController@getCreate');
Route::post('/parents/create', 'ParentsController@postCreate');
Route::post('/parents/existing', 'ParentsController@getExisting');
