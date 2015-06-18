<?php namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Validator;

abstract class Model extends BaseModel {

	/**
	 * Validation option for this model
	 */
	public static $validation_enabled = true;


	/**
	 * Validation rules for model store
	 * 
	 * @var array $store_validation_rules
	 */
	public static $store_validation_rules = array();


	/**
	 * Validation rules for model update
	 * 
	 * @var array $update_validation_rules
	 */
	public static $update_validation_rules = array();


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
	public function validate($rules, $errors = null) {
		$this->validation = Validator::make($this->attributes, $rules, (array) $errors);
		
		return $this->validation->passes();
	}
	
	
	/**
	 * Execute store validation rules for this model on the specified data
	 * 
	 * @param array|null $rules
	 * @param array|null $errors
	 * 
	 * @return boolean
	 */
	public function validateStore($extra_rules = null, $extra_errors = null) {
		// Add or overwrite store rules and error messages
		$rules = array_merge_recursive(static::$store_validation_rules, (array) $extra_rules); 
		$errors = array_merge_recursive(static::$validation_errors, (array) $extra_errors);

		// Execute validation
		return $this->validate($rules, $errors);
	}


	/**
	 * Execute update validation rules for this model on the specified data
	 * 
	 * @param array|null $rules
	 * @param array|null $errors
	 * 
	 * @return boolean
	 */
	public function validateUpdate($extra_rules = null, $extra_errors = null) {
		// Add or overwrite update rules and error messages
		$rules = array_merge_recursive(static::$update_validation_rules, (array) $extra_rules); 
		$errors = array_merge_recursive(static::$validation_errors, (array) $extra_errors);

		// Execute validation
		return $this->validate($rules, $errors);
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