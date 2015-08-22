<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\UserSession;

class MatchController extends Controller
{

	public function index(Request $request) {
		$session = UserSession::current();
		$user = $session->user;
		$matches = $user->matches()->with(['host', 'guest'])->get();
		
		return view('match.index', compact('session', 'user', 'matches'));
	}


	public function create(Request $request) {
		$session = UserSession::current();
		$user = $session->user;
		
		return view('match.create', compact('session', 'user'));
	}


	public function store(Request $request) {
		
	}


	public function show(Request $request, $id) {
		$session = UserSession::current();
		$user = $session->user;
		$match = $user->matches()->with(['host', 'guest'])->find($id);
		
		return view('match.show', compact('session', 'user', 'match'));
	}


	public function edit(Request $request, $id) {
		
	}


	public function update(Request $request, $id) {
		
	}


	public function destroy(Request $request, $id) {
		
	}

}