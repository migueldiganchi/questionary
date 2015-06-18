<?php namespace App;

use App\Model;

class User extends Model {

	// Database table
	protected $table = 'users';

	// Validation rules for model store
	public static $store_validation_rules = array();

	// Validation rules for model update
	public static $update_validation_rules = array();

	// Error Messages for model validation
	public static $validation_errors = array();


	/**
	 * Relationship with sessions
	 */
	public function sessions() {
		return $this->hasMany('App\Session', 'user_id', 'id');
	}

	/**
	 * Relationship with questions
	 */
	public function questions() {
		return $this->hasMany('App\Question', 'user_id', 'id');
	}

	/**
	 * Relationship with match invitations
	 */
	public function matchInvitationsSent() {
		return $this->hasMany('App\MatchInvitation', 'host_id', 'id');
	}

	/**
	 * Relationship with match invitations
	 */
	public function matchInvitations() {
		return $this->hasMany('App\MatchInvitation', 'guest_id', 'id');
	}
	
	/**
	 * Relationship with matches
	 */
	public function matches() {
		return $this->hasMany('App\Match', 'user_id', 'id');
	}


	/**
	 * Retrieves the current user
	 * 
	 * @return User
	 */
	public static function current() {
		return static::find(1);
	}
}