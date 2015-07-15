<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\UserSession;

class QuestionController extends Controller
{

    public function index(Request $request) {

		$session = UserSession::current();
    	$user = $session->user;

       	return view('question.index', compact('user'));
    }
    
}