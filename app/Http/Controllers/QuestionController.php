<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\UserSession;

class QuestionController extends Controller
{

	public function index(Request $request) {

		$session = UserSession::current();
		$user = $session->user;
		$questions = $user->questions()->with(['answers'])->orderBy('order', 'asc')->get();
		
		return view('question.index', compact('session', 'user', 'questions'));
	}


	public function create(Request $request) {
		$session = UserSession::current();
		$user = $session->user;
		
		return view('question.create', compact('session', 'user'));
	}


	public function store(Request $request) {
// 		$input = $request->only('text');
// 		$answers = (array) $request->input('answers', array());
	}


	public function show(Request $request, $id) {
		$session = UserSession::current();
		$user = $session->user;
		$question = $user->questions()->find($id);
		
		return view('question.show', compact('session', 'user', 'question'));
	}


	public function edit(Request $request, $id) {
		
	}


	public function update(Request $request, $id) {
		
	}


	public function destroy(Request $request, $id) {
		
	}

}