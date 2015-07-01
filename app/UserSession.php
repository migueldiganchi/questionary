<?php namespace App;

use App\Model;

class UserSession extends Model {

	static $COOKIE_NAME = 'app_key';

	static $LIFE_TIME = 60;

	// Database table
	protected $table = 'user_sessions';

	// Validation rules for model store
	public static $store_validation_rules = array(
		'session_id' => ['required', 'string', 'max:32'],
		'user_id' => ['integer', 'min:0'],
		'fb_token' => ['string', 'max:64'],
		'expires_at' => ['date'],
	);

	// Validation rules for model update
	public static $update_validation_rules = array();

	// Error Messages for model validation
	public static $validation_errors = array();

	/**
	 * Relationship with users
	 */
	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	/**
	 * Retrieves the current session
	 * 
	 * @return Session
	 */
	public static function current() {
	//	$session_id = ;
	//	return static::find($session_id);
	}

}