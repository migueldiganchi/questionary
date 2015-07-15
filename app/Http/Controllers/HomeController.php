<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Facebook;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;


class HomeController extends Controller
{

    public function index(Request $request) {

        $fb_scopes = array('public_profile', 'email', 'read_custom_friendlists', 'user_friends');

        $fb_helper = new FacebookRedirectLoginHelper(route('user.auth'));

       	return view('home.index', compact('fb_helper', 'fb_scopes'));
    }
    
}