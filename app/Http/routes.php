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

$app->group(['namespace' => 'App\Http\Controllers'], function($group){
	// $group->get('/', function() use ($app) {
	//     // return $app->welcome();
	// });

	$group->get('login', [
	    'as' 	=> 'user.login', 
		'uses' 	=> 'UserController@login'
	]);

	$group->get('auth', [
	    'as' 	=> 'user.auth', 
	    'uses' 	=> 'UserController@auth'
	]);
});


// $app->get('/', function() use ($app) {
//     return $app->welcome();
// });

// $app->get('login', [
//     'as' 	=> 'user.login', 
// 	'uses' 	=> 'UserController@login'
// ]);

// // $app->get('login', ['uses' => 'UserController@login', 'as' => 'user.login']);

// $app->get('auth', [
//     'as' 	=> 'user.auth', 
//     'uses' 	=> 'UserController@auth'
// ]);