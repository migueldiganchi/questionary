<?php namespace App\Http\Middleware;

use Closure;

use App\UserSession;

class Auth
{
    public function handle($request, Closure $next)
    {
    	$session_id = $request->cookie(UserSession::$COOKIE_NAME);
    	
    	if (!$session_id) {
            return redirect('login')->withCookies(array(
				cookie(UserSession::$COOKIE_NAME, '', '-10 year'), // Unset cookie
	        ));
    	}
    	
    	$now = date('Y-m-d H:i:s');
    	$active_session = UserSession::where('session_id', '=', $session_id)->where('expires_at', '>', $now)->first();
    	
    	if (!$active_session) {
            return redirect('login')->withCookies(array(
				cookie(UserSession::$COOKIE_NAME, '', '-10 year'), // Unset cookie
	        ));
    	}
    	
    	UserSession::current($active_session);
    	
        return $next($request);
    }

    public function terminate($request, $response)
    {
    	$current_session = UserSession::current();
    	
    	if ($current_session) {
    		$current_session->update(array(
				'expires_at' => date('Y-m-d H:i:s', time() + UserSession::$LIFE_TIME * 60),
			));
    	}
    }
}