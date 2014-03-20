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

Route::get('login', 'AuthenticationController@create')->before('guest');
Route::get('logout',['as' => 'logout', 'uses' => 'AuthenticationController@destroy'])->before('auth');

Route::resource('Authentication' , 'AuthenticationController', ['only' => ['store', 'create', 'destroy']]);

Route::group(array('before' => 'auth'), function(){
	Route::resource('Area', 'AreaController');

	Route::get('/', ['as' => 'home',  function()
	{
		return View::make('hello');
	}]);

});