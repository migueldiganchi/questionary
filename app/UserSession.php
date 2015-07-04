<?php namespace App;

use App\Model;

class UserSession extends Model {

	static $COOKIE_NAME = 'app_key';

	static $LIFE_TIME = 60;

	// Current session
	static $current = null;

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
	public static $update_validation_rules = array(
		'session_id.required' => 'user_session_id_required',
		'session_id.string' => 'user_session_id_invalid_type',
		'session_id.max' => 'user_session_id_invalid_value',
		'user_id.integer' => 'user_session_id_invalid_type',
		'user_id.min' => 'user_session_user_id_invalid_value',
	);

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
	 * @return UserSession
	 */
	public static function current($session = null) {
		
		if (!is_null($session)) {
			static::$current = $session;
		}
		
		return static::$current;
	}
	
	/**
	 * Unset the current session
	 */
	public static function unsetCurrent() {
		static::$current = null;
	}
	
	/**
	 * Check if exists logged in session
	 * 
	 * @return Boolean
	 */ 
	public static function isLoggedIn() {
		return isset(static::$current);
	}
}