<?php namespace App;

use App\Model;

class MatchQuestion extends Model {

	// Database table
	protected $table = 'match_questions';

	// Validation rules for model store
	public static $store_validation_rules = array();

	// Validation rules for model update
	public static $update_validation_rules = array();

	// Error Messages for model validation
	public static $validation_errors = array();

	/**
	 * Relationship with matches
	 */
	public function match() {
		return $this->belongsTo('App\Match', 'match_id', 'id');
	}

	/**
	 * Relationship with match answer
	 */
	public function answers() {
		return $this->hasMany('App\MatchAnswer', 'question_id', 'id');
	}

}