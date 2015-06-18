<?php namespace App;

use App\Model;

class Match extends Model {

	// Database table
	protected $table = 'matches';

	// Validation rules for model store
	public static $store_validation_rules = array();

	// Validation rules for model update
	public static $update_validation_rules = array();

	// Error Messages for model validation
	public static $validation_errors = array();


	/**
	 * Relationship with host
	 */
	public function host() {
		return $this->belongsTo('App\User', 'host_id', 'id');
	}

	/**
	 * Relationship with guest
	 */
	public function guest() {
		return $this->belongsTo('App\User', 'guest_id', 'id');
	}
	
	/**
	 * Relationship with questions
	 */
	public function questions() {
		return $this->hasMany('App\MatchQuestion', 'match_id', 'id');
	}
	

}