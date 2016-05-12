<?php

# ------------------------------------
# Authentication
# ------------------------------------
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');
Route::get('/logout', 'Auth\AuthController@logout');

Route::get('/', 'WelcomeController@index');

Route::group(['middleware' => 'auth'], function() {
		
	/****** Parents/Users Routes ********/
	
	Route::get('/parents/create', 'ParentsController@getCreate');
	
	Route::post('/parents/edit', 'ParentsController@postEdit');
	
	Route::post('/parents/showProfilePicture', 'ParentsController@postEditProfilePicture');
	
	/* profile picture screen*/
	Route::get('/parents/addProfilePicture', 'ParentsController@getProfilePicture');
	Route::post('/parents/addProfilePicture', 'ParentsController@postProfilePicture');
	
	/****** Children Routes ********/
	
	Route::get('/children/create', 'ChildrenController@getChildrenProfile');
	
	Route::get('/children/createChild', 'ChildrenController@getCreateChild');
	Route::post('/children/createChild', 'ChildrenController@postCreateChild');
	
	Route::get('/children/editChild/{id?}', 'ChildrenController@getEditChild');
    Route::post('/children/editChild', 'ChildrenController@postEditChild');
	
	Route::get('/children/confirm-removeChild/{id?}', 'ChildrenController@getRemoveChild');
    Route::get('/children/removeChild/{id?}', 'ChildrenController@postRemoveChild');
	
	/****** Events Routes ********/
	
	Route::get('/events/create', 'EventsController@getEventsProfile');
	
	Route::get('/events/createEvent/{id?}', 'EventsController@getCreateEvent');
	Route::post('/events/createEvent', 'EventsController@postCreateEvent');
	
	Route::get('/events/viewEvent/{id?}', 'EventsController@getViewEvent');
	
	Route::get('/events/editEvent/{id?}', 'EventsController@getEditEvent');
    Route::post('/events/editEvent', 'EventsController@postEditEvent');
	
	Route::get('/events/confirm-removeEvent/{id?}', 'EventsController@getRemoveEvent');
    Route::get('/events/removeEvent/{id?}', 'EventsController@postRemoveEvent');
	
	Route::get('/events/createEventsReport/{id?}', 'EventsController@getEventsReport');
	
	
});
