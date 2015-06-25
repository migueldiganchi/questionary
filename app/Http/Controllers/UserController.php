<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Session;
use App\User;

use Illuminate\Http\Request;

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

    public function auth()
    {
        $fb_helper = new FacebookRedirectLoginHelper(route('user.auth'));

        try {
          $session = $fb_helper->getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
          $this->showFormatedException($ex, 'ex'); exit();
        } catch(\Exception $ex) {
          $this->showFormatedException($ex, 'ex'); exit();
        }

        // check if the user has been logged
        if (!$session) {
            return redirect('user.login')->with('error_message', 'El usuario no tiene cuenta.');
        }
        
        $this->showFormatedException($session, 'session');

        // read data from the user
        $me = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());

        $this->showFormatedException($me, 'me');
        
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
        
        // @todo: create session
        //Session::create(array(
        //	'id' => md5(Request::ip().time()),
        //	'user_id' => $user->id,
        //	'ip' => Request::ip(),
        //	'expires_at' => date('Y-m-d H:i:s', strtotime('+2 hours')),
		//));
		
		$this->showFormatedException($user->toArray(), 'user');		
		exit();

        return redirect()->route('question.index');
    }

    public function logout() {

    }

}