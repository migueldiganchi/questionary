<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function index(Request $request) {

    	$expires_at = $request->session()->get('expires_at');

		$this->showFormatedObject($expires_at, 'expires_at');

       	return view('question.index');
    }

}