<?php namespace App;

use App\Model;

class MatchAnswer extends Model
{
	// Database table
	protected $table = 'match_answers';

	// Validation rules for this model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'match_id' => ['integer', 'min:0'],
		'question_id' => ['integer', 'min:0'],
		'order' => ['integer', 'between:0,255'],
		'text' => ['string'],
		'right' => ['boolean'],
		'selected' => ['boolean'],
	);

	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'match_answer_id_invalid_type',
		'id.min' => 'match_answer_id_invalid_value',
		'match_id.required' => 'match_answer_match_id_required',
		'match_id.integer' => 'match_answer_match_id_invalid_type',
		'match_id.min' => 'match_answer_match_id_invalid_value',
		'question_id.required' => 'match_answer_question_id_required',
		'question_id.integer' => 'match_answer_question_id_invalid_type',
		'question_id.min' => 'match_answer_question_id_invalid_value',
		'order.integer' => 'match_answer_order_invalid_type',
		'order.between' => 'match_answer_order_invalid_value',
		'text.string' => 'match_answer_text_invalid_type',
		'right.boolean' => 'match_answer_right_invalid_value',
		'right.selected' => 'match_answer_selected_invalid_value',
	);


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