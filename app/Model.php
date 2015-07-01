<?php namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Validator;

abstract class Model extends BaseModel {

	// Unguard all attributes
	protected $guarded = array();

	/**
	 * Validation option for this model
	 */
	public static $validation_enabled = true;


	/**
	 * Validation rules for this model
	 * 
	 * @var array $validation_rules
	 */
	public static $validation_rules = array();


	/**
	 * Error Messages for model validations
	 * 
	 * @var array $validation_errors
	 */
	public static $validation_errors = array();


	/**
	 * Validation result for this model
	 * 
	 * @var Validator|null $validation
	 */
	public $validation = null;


	/**
	 * Register Boot events 
	 */
	protected static function boot()
	{
		parent::boot();
		
		static::creating(function($model) {
			return static::$validation_enabled ? $model->validateStore() : true;
		});

		static::updating(function($model) {
			return static::$validation_enabled ? $model->validateUpdate() : true;
		});
	}

	/**
	 * Executes validation rules on the current model
	 * This method abstracts the Validator class for models.
	 * 
	 * @param array $rules
	 * @param array|null $errors
	 * 
	 * @return boolean
	 */
	public function validate($rules = null, $errors = null) {
		$this->validation = Validator::make($this->attributes, $rules, (array) $errors);
		
		return $this->validation->passes();
	}
	
	
	/**
	 * Execute store validation rules for this model on the specified data
	 * 
	 * @return boolean
	 */
	public function validateStore() {
		// Add or overwrite validation rules and error messages

		// Execute validation
		return $this->validate(static::$validation_rules, static::$validation_errors);
	}


	/**
	 * Execute update validation rules for this model on the specified data
	 * 
	 * @return boolean
	 */
	public function validateUpdate() {
		// Add or overwrite validation rules and error messages

		// Execute validation
		return $this->validate(static::$validation_rules, static::$validation_errors);
	}
	
	
	/**
	 * Defines if this model has validation errors
	 * 
	 * @return boolean
	 */
	public function hasErrors() {
		return (isset($this->validation) && !$this->validation->errors()->isEmpty());
	}
	
	
	/**
	 * Enables or disables model validation
	 * 
	 * @param boolean $enabled
	 */
	 public static function enableValidation($enabled) {
	 	static::$validation_enabled = (boolean) $enabled;
	 }
}