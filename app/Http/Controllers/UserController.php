<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Facebook;
use Facebook\FacebookRedirectLoginHelper;

class UserController extends Controller
{

    public function login() {

        $fb_helper = new FacebookRedirectLoginHelper(route('user.auth'));

        return view('user.login', compact('fb_helper'));
    }

    public function auth()
    {
        
        try {
          $session = $helper->getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
          // When Facebook returns an error
        } catch(\Exception $ex) {
          // When validation fails or other local issues
        }
        if ($session) {
          // Logged in
        }
    }

    public function logout() {

    }

}