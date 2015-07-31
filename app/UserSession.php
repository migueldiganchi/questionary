<?php namespace App;

use Cookie;
use App\Model;

class UserSession extends Model {

	static $COOKIE_NAME = 'app_key';

	static $LIFE_TIME = 60;

	// Current session
	static $current = null;

	// Database table
	protected $table = 'user_sessions';

	// Primary Key
	protected $primaryKey = 'session_id';

	// Disable auto-increment for primary key
	public $incrementing = false;


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
	 * Filter active sessions
	 * 
	 */
	public function active() {
		return $this->where('expires_at', '>', date('Y-m-d H:i:s'));
	}


	/**
	 * Sets the current session
	 * 
	 * @return UserSession
	 */
	public static function setCurrent($session) {
		static::$current = $session;
		
		return static::$current;
	}


	/**
	 * Unset the current session
	 */
	public static function unsetCurrent() {
		static::$current = null;
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
	 * Check if exists logged in session
	 * 
	 * @return Boolean
	 */ 
	public static function isLoggedIn() {
		return isset(static::$current);
	}
	
	
	/**
	 * Changes the current session
	 * 
	 * @return UserSession
	 */
	public static function change($session_id) {
		
		if (is_null($session_id)) {
			static::$current = $session_id;
		}
		elseif (is_a($session_id, __CLASS__)) {
			static::$current = $session_id;
		}
		else {
			static::$current = static::active()->where(static::primaryKey(), $session_id)->first();
		}
		
		// Set cookie for current session
		if (isset(static::$current->session_id)) {
			static::setCookie(static::$current->session_id);
		}
		else {
			static::removeCookie();
		}
		
		return static::$current;
	}

	
	/**
	 * Sets the session cookie
	 */
	public static function setCookie($session_key) {
		Cookie::queue(UserSession::$COOKIE_NAME, $session_key, UserSession::$LIFE_TIME);
	}


	/**
	 * Gets the session cookie
	 */
	public static function getCookie() {
		return Cookie::get(UserSession::$COOKIE_NAME, null);
	}


	/**
	 * Removes the session cookie
	 */
	public static function removeCookie() {
		Cookie::queue(UserSession::$COOKIE_NAME, '', '-10 year');
	}
	
	
}