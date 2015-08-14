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

$app->group(['namespace' => 'App\Http\Controllers'], function($group) {

	//
	// Home
	//
	$group->get('/', [
		'as' 	=> 'home.index',
		'uses' 	=> 'HomeController@index',
	]);


	//
	// Authentication
	//
// 	$group->get('login', [
// 		'as' 	=> 'user.login', 
// 		'uses' 	=> 'UserController@login'
// 	]);

// 	$group->get('auth', [
// 		'as' 	=> 'user.auth', 
// 		'uses' 	=> 'UserController@auth'
// 	]);

	$group->get('auth/facebook', [
		'as' 	=> 'user.auth.facebook', 
		'uses' 	=> 'UserController@authFacebook'
	]);

	$group->get('logout', [
		'as' 	=> 'user.logout', 
		'uses' 	=> 'UserController@logout'
	]);


	//
	// Questions
	//
	$group->get('question', [
		'as' 	=> 'question.index', 
		'uses' 	=> 'QuestionController@index',
		'middleware' => 'require-auth'
	]);

	$group->get('question/create', [
		'as' 	=> 'question.create', 
		'uses' 	=> 'QuestionController@create',
		'middleware' => 'require-auth'
	]);

	$group->post('question', [
		'as' 	=> 'question.store', 
		'uses' 	=> 'QuestionController@store',
		'middleware' => 'require-auth'
	]);

	$group->get('question/{id}', [
		'as' 	=> 'question.show', 
		'uses' 	=> 'QuestionController@show',
		'middleware' => 'require-auth'
	]);

	$group->get('question/{id}/edit', [
		'as' 	=> 'question.edit', 
		'uses' 	=> 'QuestionController@edit',
		'middleware' => 'require-auth'
	]);

	$group->put('question/{id}', [
		'as' 	=> 'question.update', 
		'uses' 	=> 'QuestionController@update',
		'middleware' => 'require-auth'
	]);

	$group->delete('question', [
		'as' 	=> 'question.destroy', 
		'uses' 	=> 'QuestionController@destroy',
		'middleware' => 'require-auth'
	]);


	//
	// Answers
	//
	$group->get('answer', [
		'as' 	=> 'answer.index', 
		'uses' 	=> 'AnswerController@index',
		'middleware' => 'require-auth'
	]);

	$group->get('answer/create', [
		'as' 	=> 'answer.create', 
		'uses' 	=> 'AnswerController@create',
		'middleware' => 'require-auth'
	]);

	$group->post('answer', [
		'as' 	=> 'answer.store', 
		'uses' 	=> 'AnswerController@store',
		'middleware' => 'require-auth'
	]);

	$group->get('answer/{id}', [
		'as' 	=> 'answer.show', 
		'uses' 	=> 'AnswerController@show',
		'middleware' => 'require-auth'
	]);

	$group->get('answer/{id}/edit', [
		'as' 	=> 'answer.edit', 
		'uses' 	=> 'AnswerController@edit',
		'middleware' => 'require-auth'
	]);

	$group->put('answer/{id}', [
		'as' 	=> 'answer.update', 
		'uses' 	=> 'AnswerController@update',
		'middleware' => 'require-auth'
	]);

	$group->delete('answer', [
		'as' 	=> 'answer.destroy', 
		'uses' 	=> 'AnswerController@destroy',
		'middleware' => 'require-auth'
	]);

	
	//
	// Match Invitations
	//
	$group->get('match-invitation', [
		'as' 	=> 'match-invitation.index', 
		'uses' 	=> 'MatchInvitationController@index',
		'middleware' => 'require-auth'
	]);

	$group->get('match-invitation/create', [
		'as' 	=> 'match-invitation.create', 
		'uses' 	=> 'MatchInvitationController@create',
		'middleware' => 'require-auth'
	]);

	$group->post('match-invitation', [
		'as' 	=> 'match-invitation.store', 
		'uses' 	=> 'MatchInvitationController@store',
		'middleware' => 'require-auth'
	]);

	$group->get('match-invitation/{id}', [
		'as' 	=> 'match-invitation.show', 
		'uses' 	=> 'MatchInvitationController@show',
		'middleware' => 'require-auth'
	]);

	$group->get('match-invitation/{id}/edit', [
		'as' 	=> 'match-invitation.edit', 
		'uses' 	=> 'MatchInvitationController@edit',
		'middleware' => 'require-auth'
	]);

	$group->put('match-invitation/{id}', [
		'as' 	=> 'match-invitation.update', 
		'uses' 	=> 'MatchInvitationController@update',
		'middleware' => 'require-auth'
	]);

	$group->delete('match-invitation', [
		'as' 	=> 'match-invitation.destroy', 
		'uses' 	=> 'MatchInvitationController@destroy',
		'middleware' => 'require-auth'
	]);


	//
	// Matches
	//
	$group->get('match', [
		'as' 	=> 'match.index', 
		'uses' 	=> 'MatchController@index',
		'middleware' => 'require-auth'
	]);

	$group->get('match/create', [
		'as' 	=> 'match.create', 
		'uses' 	=> 'MatchController@create',
		'middleware' => 'require-auth'
	]);

	$group->post('match', [
		'as' 	=> 'match.store', 
		'uses' 	=> 'MatchController@store',
		'middleware' => 'require-auth'
	]);

	$group->get('match/{id}', [
		'as' 	=> 'match.show', 
		'uses' 	=> 'MatchController@show',
		'middleware' => 'require-auth'
	]);

	$group->get('match/{id}/edit', [
		'as' 	=> 'match.edit', 
		'uses' 	=> 'MatchController@edit',
		'middleware' => 'require-auth'
	]);

	$group->put('match/{id}', [
		'as' 	=> 'match.update', 
		'uses' 	=> 'MatchController@update',
		'middleware' => 'require-auth'
	]);

	$group->delete('match', [
		'as' 	=> 'match.destroy', 
		'uses' 	=> 'MatchController@destroy',
		'middleware' => 'require-auth'
	]);


	//
	// Match Questions
	//
	$group->get('match-question', [ // List questions for a match
		'as' 	=> 'match-question.index', 
		'uses' 	=> 'MatchQuestionController@index',
		'middleware' => 'require-auth'
	]);

	$group->get('match-question/{id}', [
		'as' 	=> 'match-question.show', 
		'uses' 	=> 'MatchQuestionController@show',
		'middleware' => 'require-auth'
	]);

	$group->get('match-question/{id}/edit', [
		'as' 	=> 'match-question.edit', 
		'uses' 	=> 'MatchQuestionController@edit',
		'middleware' => 'require-auth'
	]);

	$group->put('match-question/{id}', [
		'as' 	=> 'match-question.update', 
		'uses' 	=> 'MatchQuestionController@update',
		'middleware' => 'require-auth'
	]);

	$group->delete('match-question', [
		'as' 	=> 'match-question.destroy', 
		'uses' 	=> 'MatchQuestionController@destroy',
		'middleware' => 'require-auth'
	]);


	//
	// Debugging
	//
	$group->get('/debug/{method}', function ($method) {
		$controller = new DebugController();
		$controller->{$method}();
	});

});

