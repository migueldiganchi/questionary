<?php namespace App\Http\Middleware;

use Closure;

use App\UserSession;

class RequireAuth
{

	public function handle($request, Closure $next)
	{
		// Get current session		
		$current_session = UserSession::current();
		
		// If is not logged in redirect to login page		
		if (!$current_session) {
			return redirect('login');
		}		    	

		return $next($request);
    }

}