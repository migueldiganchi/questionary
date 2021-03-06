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

		if ($request->ajax()) {
			return view('home._home');			
		}

		return view('home.index');
	}

}