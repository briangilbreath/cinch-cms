<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Debug for showing SQL queries
// Event::listen('illuminate.query', function($query){
// 	var_dump($query);
// });


// public
Route::get('/', 'PostController@All');
Route::get('/tags', 'TagController@All');

Route::resource('tag', 'TagController', ['only' => ['show']]);


//login/logout
Route::get('login','SessionsController@Create');
Route::get('logout','SessionsController@Destroy');

//sessions
Route::resource('sessions', 'SessionsController', ['only' => ['index', 'store', 'create', 'destroy']]);



//admin area
Route::group(array('prefix'=> 'admin', 'before' => 'auth'), function(){

	//admin dashboard
	Route::get('/', 'AdminController@index');

	//admin update user profile
	Route::get('/profile/', 'UserController@edit');
	Route::resource('user', 'UserController', ['only' => ['update']]);

	//admin site options
	Route::get('/options', 'AdminController@options');
	Route::get('/options/clear-cache', 'AdminController@clear_cache');

	//admin resources for posts/tags/photos
	Route::resource('post', 'PostController');
	Route::resource('tag', 'TagController');
	Route::resource('photo', 'PhotoController');



});


//install process
Route::get('install','SetupController@install');
Route::post('installing','SetupController@create_admin_user');

//slugs for getting public posts, needs to be at bottom
Route::get('/tag/{slug?}', ['as' => 'tag.show', 'uses' =>   'TagController@Show']);
Route::get('{slug?}', ['as' => 'post.show', 'uses' =>   'PostController@Show']);