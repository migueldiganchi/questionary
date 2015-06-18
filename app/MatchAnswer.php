<?php namespace App;

use App\Model;

class MatchAnswer extends Model {

	// Database table
	protected $table = 'match_answers';

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
	 * Relationship with questions
	 */
	public function question() {
		return $this->belongsTo('App\MatchQuestion', 'question_id', 'id');
	}

}