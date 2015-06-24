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

        $fb_scopes = array('email', 'public_profile', 'read_custom_friendlists', 'user_friends');

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

        // read data from the user
        $me = (new FacebookRequest($session, 'GET', '/me'))->execute()->getGraphObject(GraphUser::className());

        $this->showFormatedException($me, 'me');

        // 1. verificar si el usuario logueado tiene cuenta con el facebook id.
        $user = User::where('fb_key', '=', $me->getProperty('id'))->first();

        // 2. si no viene con facebook id, buscarlo por el correo y asociarle el facebook id. 
        if (!$user) {

            $user = User::where('email', '=', $me->getProperty('email'))->first();

            // 3. si no tiene ninguno, crearlo y le seteamos el facebook id.
            if (!$user) {

                // creamos el usuario
                $user = User::create( array(
                    'email'     => $me->getProperty('email'),
                    'name'      => $me->getProperty('name')
                ));
            }

            $user->fb_key = $me->getProperty('id');
        }

        // @todo:
        // $user->last_login = date('Y-m-d H:i:s');
        // $user->save();

        return redirect()->route('question.index');
    }

    public function logout() {

    }

}