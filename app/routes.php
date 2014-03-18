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

Route::get('profile', function(){
	return "Welcome " . Auth::user()->username . " your email is " . Auth::user()->email;
})->before('auth');;

Route::get('login', 'AuthenticationController@create');
Route::get('logout', 'AuthenticationController@destroy');
Route::resource('Authentication' , 'AuthenticationController', ['only' => ['store', 'create', 'destroy']]);


Route::get('/', ['as' => 'home',  function()
{
	return View::make('hello');
}]);