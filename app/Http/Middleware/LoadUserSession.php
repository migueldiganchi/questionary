<?php namespace App\Http\Middleware;

use Closure;
use Cookie;
use Illuminate\Contracts\Routing\TerminableMiddleware;
use App\UserSession;

class LoadUserSession implements TerminableMiddleware
{

	public function handle($request, Closure $next)
	{
		// Get the UserSession ID from cookies
		$session_id = $request->cookie(UserSession::$COOKIE_NAME);
		
		// If UserSession cookie is not defined, remove cookie
		if (!$session_id) {
			Cookie::queue(UserSession::$COOKIE_NAME, '', '-10 year'); // Unset cookie
			return $next($request);
		}

		// Find the active session
		$now = date('Y-m-d H:i:s');
		$active_session = UserSession::where('session_id', '=', $session_id)->where('expires_at', '>', $now)->first();
		
		// If there is not active session for the cookie ID, remove cookie 
		if (!$active_session) {
			Cookie::queue(UserSession::$COOKIE_NAME, '', '-10 year'); // Unset cookie
			return $next($request);
		}

		// Set the session found as current session
		UserSession::current($active_session);

		return $next($request);
	}

	public function terminate($request, $response)
	{
		// Get the current session
		$current_session = UserSession::current();
		
		// If current session is defined
		if ($current_session) {
			$current_session->update(array(
				'expires_at' => date('Y-m-d H:i:s', time() + UserSession::$LIFE_TIME * 60),
			));
		}
	}

}