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

Route::get('/', 'PostController@All');
Route::get('/tags', 'TagController@All');
//Route::resource('post', 'PostController', ['only' => ['index', 'show']]);


Route::resource('tag', 'TagController', ['only' => ['show']]);

Route::get('login','SessionsController@Create');
Route::get('logout','SessionsController@Destroy');
Route::resource('sessions', 'SessionsController', ['only' => ['index', 'store', 'create', 'destroy']]);



//admin area
Route::group(array('prefix'=> 'admin', 'before' => 'auth'), function(){

	Route::get('/', 'AdminController@Index');
	Route::get('/options', 'AdminController@options');
	Route::resource('post', 'PostController');
	Route::resource('tag', 'TagController');
	Route::resource('photo', 'PhotoController');

});


//install process
Route::get('install','SetupController@install');
Route::post('installing','SetupController@create_admin_user');

//slugs for getting public posts
Route::get('/tag/{slug?}', ['as' => 'tag.show', 'uses' =>   'TagController@Show']);
Route::get('{slug?}', ['as' => 'post.show', 'uses' =>   'PostController@Show']);