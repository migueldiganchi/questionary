<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\UserSession;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Cookie;

use Facebook;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

class UserController extends Controller
{
    public function login() {

        $fb_scopes = array('public_profile', 'email', 'read_custom_friendlists', 'user_friends');

        $fb_helper = new FacebookRedirectLoginHelper(route('user.auth'));

        return view('user.login', compact('fb_helper', 'fb_scopes'));
    }

    public function auth(Request $request, Response $response)
    {
        $fb_helper = new FacebookRedirectLoginHelper(route('user.auth'));

        try {
          $fb_session = $fb_helper->getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
          $this->showFormatedObject($ex, 'ex'); exit();
        } catch(\Exception $ex) {
          $this->showFormatedObject($ex, 'ex'); exit();
        }
        
        // check if the user has been logged
        if (!$fb_session) {
            return redirect('user.login')->with('error_message', 'El usuario no tiene cuenta.');
        }
        
        // read data from the user
        $me = (new FacebookRequest($fb_session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());
        
        // Get the facebook profile ID
        $fb_id = $me->getProperty('id');

        // Check if user exists for current facebook ID.
        $user = User::where('fb_id', '=', $fb_id)->first();

        // If user does not exists, check by email
        if (!$user) {
            $user = User::where('email', '=', $me->getProperty('email'))->first();
        }

        // If user is not found, create it using facebook profile information
        if (!$user) {
			$user = User::create( array(
				'email' => $me->getProperty('email'),
				'name' => $me->getProperty('name'),
				'fb_id' => $fb_id,
			));
		}

		// Set current facebook ID if has a different one
		if ($user->fb_id != $fb_id) {
			$user->fb_id = $fb_id;
		}

        // Update user login time
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();
        
        // create new session
        $new_session = UserSession::create(array(
            'session_id' => md5( $user->email . $request->getClientIp() . time() ), 
            'user_id' => $user->id,
            'fb_token' => $fb_session->getToken(),
            'ip' => $request->getClientIp(),
            'expires_at' => date('Y-m-d H:i:s', time() + UserSession::$LIFE_TIME * 60),
    	));
    	
    	Cookie::unqueue(UserSession::$COOKIE_NAME);
    	UserSession::current($new_session);

        // set sessions vars
        return redirect()->route('question.index')->withCookies(array(
            cookie(UserSession::$COOKIE_NAME, $new_session->session_id, UserSession::$LIFE_TIME),
        ));
    }

    public function logout() {
    	// Unset current session
    	UserSession::unsetCurrent();
    	
    	// Unset session cookie and redirect to Home page
    	return redirect()->route('home.index')->withCookies(array(
            cookie(UserSession::$COOKIE_NAME, '', '-10 year'),
        ));
    }

}

