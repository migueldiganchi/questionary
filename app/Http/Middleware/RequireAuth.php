<?php namespace App\Http\Middleware;

use Closure;

use App\Http\Controllers\Controller;
use App\UserSession;

class RequireAuth
{

	public function handle($request, Closure $next)
	{
		// Get current session
		$current_session = UserSession::current();

		// If is not logged in redirect to login page
		if (!$current_session) {

			if ($request->ajax()) {

				return Controller::responseJsonError('LOGIN_REQUIRED', 'El usuario no esta logueado');
				
			}
			
			return redirect()->route('home.index');;
		}

		return $next($request);
	}

}