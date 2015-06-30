<?php namespace App;

use App\Model;

class User extends Model
{
	// Database table
	protected $table = 'users';

	// Validation rules for model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'email' => ['required', 'string', 'max:255', 'email'],
		'name' => ['string', 'max:128'],
		'password' => ['string', 'max:32'],
		'fb_id' => ['string', 'max:32'],
		'questions_number' => ['integer', 'between:0,255'],
	);

	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'user_id_invalid_type',
		'id.min' => 'user_id_invalid_value',
		'email.required' => 'user_email_required',
		'email.string' => 'user_email_invalid_type',
		'email.max' => 'user_email_invalid_length',
		'email.email' => 'user_email_invalid_value',
		'email.unique' => 'user_email_already_exists',
		'name.string' => 'user_name_invalid_type',
		'name.max' => 'user_name_invalid_length',
		'password.string' => 'user_password_invalid_type',
		'password.max' => 'user_password_invalid_length',
		'fb_id.string' => 'user_fb_id_invalid_type',
		'fb_id.max' => 'user_fb_id_invalid_length',
		'questions_number.integer' => 'user_questions_number_invalid_type',
		'questions_number.between' => 'user_questions_number_invalid_value',
	);


	/**
	 * Executes store validation rules for this model
	 * 
	 * @return boolean
	 */
	public function validateStore() {

		// Add extra validation rules and error messages
		$validation_rules = array_merge_recursive(static::$validation_rules, array(
			'email' => [ "unique:{$this->table},email,NULL,id" ],
		));

		// Execute validation
		return $this->validate($validation_rules, static::$validation_errors);
	}
	
	/**
	 * Executes update validation rules for this model
	 * 
	 * @return boolean
	 */
	public function validateUpdate() {

		// Add extra validation rules and error messages
		$validation_rules = array_merge_recursive(static::$validation_rules, array(
			'name' => [ "unique:{$this->table},email,{$this->id},id" ],
		));

		// Execute validation
		return $this->validate($validation_rules, static::$validation_errors);
	}


	/**
	 * Relationship with sessions
	 */
	public function sessions() {
		return $this->hasMany('App\UserSession', 'user_id', 'session_id');
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

}