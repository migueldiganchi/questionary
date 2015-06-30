<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserSession;

class QuestionController extends Controller
{

    public function index(Request $request) {

    	$session_id = $request->cookie(UserSession::$COOKIE_NAME);

    	// @todo: get user data with session_id

		$this->showFormatedObject($session_id, 'session_id');

       	return view('question.index');
    }
    
}