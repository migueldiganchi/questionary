<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\UserSession;

class QuestionController extends Controller
{

    public function index(Request $request) {

		$session = UserSession::current();
//		$this->showFormatedObject($current_session, '$session');
    	$user = $session->user;
    	$this->showFormatedObject($user, '$user');

       	return view('question.index');
    }
    
}