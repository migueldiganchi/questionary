<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    //

	function showFormatedObject($obj, $obj_name) {

		echo "<pre> {$obj_name} = ". print_r($obj, true) . "</pre>";
	}
}
