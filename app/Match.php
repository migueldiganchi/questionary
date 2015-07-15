<?php namespace App;

use App\Model;

class Match extends Model
{
	// Database table
	protected $table = 'matches';

	// Validation rules for this model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'host_id' => ['required', 'integer', 'min:0'],
		'guest_id' => ['required', 'integer', 'min:0'],
		'questions_number' => ['integer', 'between:0,255'],
		'answers_number' => ['integer', 'between:0,255'],
		'rights_number' => ['integer', 'between:0,255'],
	);

	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'match_id_invalid_type',
		'id.min' => 'match_id_invalid_value',
		'host_id.required' => 'match_host_id_required',
		'host_id.integer' => 'match_host_id_invalid_type',
		'host_id.min' => 'match_host_id_invalid_value',
		'guest_id.required' => 'match_guest_id_required',
		'guest_id.integer' => 'match_guest_id_invalid_type',
		'guest_id.min' => 'match_guest_id_invalid_value',
		'questions_number.integer' => 'match_questions_number_invalid_type',
		'questions_number.between' => 'match_questions_number_invalid_value',
		'answers_number.integer' => 'match_answers_number_invalid_type',
		'answers_number.between' => 'match_answers_number_invalid_value',
		'rights_number.integer' => 'match_rights_number_invalid_type',
		'rights_number.between' => 'match_rights_number_invalid_value',
	);


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