<?php namespace App;

use App\Model;

class Session extends Model {

	// Database table
	protected $table = 'sessions';

	protected $fillable = array('id', 'ip', 'user_id', 'fb_key', 'expires_at');

	// Validation rules for model store
	public static $store_validation_rules = array(
		'id' => ['required', 'string', 'max:32'],
		'user_id' => ['integer', 'min:0'],
		'fb_key' => ['string', 'max:64'],
		'expire_at' => ['date'],
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
//		$session_id = ;
//		return static::find($session_id);
	}

}