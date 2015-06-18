<?php namespace App;

use App\Model;

class Question extends Model {

	// Database table
	protected $table = 'questions';

	// Validation rules for model store
	public static $store_validation_rules = array();

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
	 * Relationship with questions
	 */
	public function answers() {
		return $this->hasMany('App\Answer', 'question_id', 'id');
	}

}