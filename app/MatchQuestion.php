<?php namespace App;

use App\Model;

class MatchQuestion extends Model
{
	// Database table
	protected $table = 'match_questions';

	// Validation rules for this model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'match_id' => ['required', 'integer', 'min:0'],
		'order' => ['integer', 'between:0,255'],
		'text' => ['string'],
		'answers_number' => ['integer', 'between:0,255'],
		'answered' => ['boolean'],
		'right' => ['boolean'],
	);
	
	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'match_question_id_invalid_type',
		'id.min' => 'match_question_id_invalid_value',
		'match_id.required' => 'match_question_match_id_required',
		'match_id.integer' => 'match_question_match_id_invalid_type',
		'match_id.min' => 'match_question_match_id_invalid_value',
		'order.integer' => 'match_question_order_invalid_type',
		'order.between' => 'match_question_order_invalid_value',
		'text.string' => 'match_question_text_invalid_type',
		'answers_number.integer' => 'match_question_answers_number_invalid_type',
		'answers_number.between' => 'match_question_answers_number_invalid_value',
		'answered.boolean' => 'match_question_answered_invalid_value',
		'right.boolean' => 'match_question_right_invalid_value',
	);

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