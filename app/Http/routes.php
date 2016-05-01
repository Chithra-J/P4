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

# ------------------------------------
# Authentication
# ------------------------------------
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/show-login-status', function() {

    # You may access the authenticated user via the Auth facade
    $user = Auth::user();

    if($user) {
        echo 'You are logged in.';
        dump($user->toArray());
    } else {
        echo 'You are not logged in.';
    }

    return;

});

/*Route::get('/', 'WelcomeController@index');*/
Route::get('/', 'WelcomeController@index');

Route::get('/parents/create', 'ParentsController@getCreate');
Route::post('/parents/create', 'ParentsController@postCreate');
Route::post('/parents/edit', 'ParentsController@postEdit');

Route::post('/parents/showProfilePicture', 'ParentsController@postEditProfilePicture');
Route::post('/parents/createProfilePicture', 'ParentsController@processProfilePicture');
Route::get('/parents/addProfilePicture', 'ParentsController@editProfilePicture');

Route::post('/parents/existing', 'ParentsController@getExisting');


Route::get('/children/create', 'ChildrenController@getCreate');
Route::post('/children/create', 'ChildrenController@postCreate');
Route::post('/children/existing', 'ChildrenController@getExisting');
