<?php

use App\Http\Controllers\DebugController;

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

$app->group(['namespace' => 'App\Http\Controllers'], function($group){

	$group->get('/', [
	    'as' 	=> 'home.index', 
	    'uses' 	=> 'HomeController@index'
	]);	

	$group->get('login', [
	    'as' 	=> 'user.login', 
		'uses' 	=> 'UserController@login'
	]);

	$group->get('auth', [
	    'as' 	=> 'user.auth', 
	    'uses' 	=> 'UserController@auth'
	]);
	
	$group->get('logout', [
	    'as' 	=> 'user.logout', 
		'uses' 	=> 'UserController@logout'
	]);

	$group->get('questions', [
	    'as' 	=> 'question.index', 
	    'uses' 	=> 'QuestionController@index',
	    'middleware' => 'auth',
	]);


	// debugging
	$group->get('/debug/{method}', function ($method) {
		$controller = new DebugController();
	 	$controller->{$method}();
	});

});

