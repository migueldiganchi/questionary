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
		$session_id = UserSession::getCookie();
		
		// If UserSession cookie is not defined, remove cookie
		if (!$session_id) {
			UserSession::removeCookie();
			return $next($request);
		}

		// Find the active session
		$active_session = UserSession::active()->find($session_id);
		
		// If there is not active session for the cookie ID, remove cookie 
		if (!$active_session) {
			UserSession::removeCookie();
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