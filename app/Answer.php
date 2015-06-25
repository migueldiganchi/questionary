<?php namespace App;

use App\Model;

class Answer extends Model
{
	// Database table
	protected $table = 'answers';

	// Validation rules for this model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'user_id' => ['required', 'integer', 'min:0'],
		'question_id' => ['required', 'integer', 'min:0'],
		'order' => ['integer', 'between:0,255'],
		'text' => ['string'],
		'right' => ['boolean'],
	);

	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'answer_id_invalid_type',
		'id.min' => 'answer_id_invalid_value',
		'user_id.required' => 'answer_user_id_required',
		'user_id.integer' => 'answer_user_id_invalid_type',
		'user_id.min' => 'answer_user_id_invalid_value',
		'question_id.required' => 'answer_question_id_required',
		'question_id.integer' => 'answer_question_id_invalid_type',
		'question_id.min' => 'answer_question_id_invalid_value',
		'order.integer' => 'answer_order_invalid_type',
		'order.between' => 'answer_order_invalid_value',
		'text.string' => 'answer_text_invalid_type',
		'right.boolean' => 'answer_right_invalid_value',
	);


	/**
	 * Relationship with users
	 */
	public function user() {
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	/**
	 * Relationship with questions
	 */
	public function question() {
		return $this->belongsTo('App\Question', 'question_id', 'id');
	}

}