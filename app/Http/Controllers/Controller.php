<?php namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

	public static function showFormatedObject($obj, $obj_name) {
		echo "<pre> {$obj_name} = ". print_r($obj, true) . "</pre>";
	}


	/**
	 * Creates a successfully JSON Response
	 * 
	 * @param mixed $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	public static function responseJsonSuccess($data) {
		return response()->json([
			'success' => 1, 
			'data' => $data,
		]);
	}

	/**
	 * Creates a JSON Response with errors
	 * 
	 * @param string $code
	 * @param string $message
	 * @param mixed $data
	 * @return \Illuminate\Http\JsonResponse
	 */
	public static function responseJsonError($code, $message, $data = null) {
		// Define error
		$error = [
			'code' => $code,
			'message' => $message,
		];

		// Attach error data if exists
		if (isset($data)) {
			$error['data'] = $data;
		}

		return response()->json([
			'success' => 0, 
			'error' => $error,
		]);
	}

}
