<?php namespace App;

use App\Model;

class Question extends Model
{
	// Database table
	protected $table = 'questions';

	// Validation rules for this model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'user_id' => ['required', 'integer', 'min:0'],
		'order' => ['integer', 'between:0,255'],
		'text' => ['string'],
		'answers_number' => ['integer', 'between:0,255'],
	);


	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'question_id_invalid_type',
		'id.min' => 'question_id_invalid_value',
		'user_id.required' => 'question_user_id_required',
		'user_id.integer' => 'question_user_id_invalid_type',
		'user_id.min' => 'question_user_id_invalid_value',
		'order.integer' => 'question_order_invalid_type',
		'order.between' => 'question_order_invalid_value',
		'text.string' => 'question_text_invalid_type',
		'answers_number.integer' => 'question_answers_number_invalid_type',
		'answers_number.between' => 'question_answers_number_invalid_value',
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
	public function answers() {
		return $this->hasMany('App\Answer', 'question_id', 'id');
	}

}