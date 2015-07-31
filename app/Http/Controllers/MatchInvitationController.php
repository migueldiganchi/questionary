<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\UserSession;

class MatchInvitationController extends Controller
{

	public function index(Request $request) {

		$session = UserSession::current();
		$user = $session->user;
		$invitations = $user->matchInvitations()->with(['host', 'guest'])->orderBy('created_at', 'desc')->get();
		
		return view('match-invitation.index', compact('session', 'user', 'invitations'));
	}


	public function create(Request $request) {
		$session = UserSession::current();
		$user = $session->user;
		
		return view('match-invitation.create', compact('session', 'user'));
	}


	public function store(Request $request) {
		
	}


	public function show(Request $request, $id) {
		$session = UserSession::current();
		$user = $session->user;
		$invitation = $user->matchInvitations()->with(['host', 'guest'])->find($id);
		
		return view('match-invitation.show', compact('session', 'user', 'invitation'));
	}


	public function edit(Request $request, $id) {
		
	}


	public function update(Request $request, $id) {
		
	}


	public function destroy(Request $request, $id) {
		
	}

}