<?php namespace App;

use App\Model;

class MatchInvitation extends Model
{
	// Database table
	protected $table = 'match_invitations';

	// Validation rules for this model
	public static $validation_rules = array(
		'id' => ['integer', 'min:0'],
		'host_id' => ['required', 'integer', 'min:0'],
		'guest_id' => ['required', 'integer', 'min:0'],
		'status' => ['string', 'size:1', 'in:p,a,r,c'] // p: pending, a: accepted, r:rejected, c: canceled
	);

	// Error Messages for model validation
	public static $validation_errors = array(
		'id.integer' => 'match_invitation_id_invalid_type',
		'id.min' => 'match_invitation_id_invalid_value',
		'host_id.required' => 'match_invitation_host_id_required',
		'host_id.integer' => 'match_invitation_host_id_invalid_type',
		'host_id.min' => 'match_invitation_host_id_invalid_value',
		'guest_id.required' => 'match_invitation_guest_id_required',
		'guest_id.integer' => 'match_invitation_guest_id_invalid_type',
		'guest_id.min' => 'match_invitation_guest_id_invalid_value',
		'order.integer' => 'match_invitation_order_invalid_type',
		'status.string' => 'match_invitation_status_invalid_type',
		'status.size' => 'match_invitation_status_invalid_size',
		'status.in' => 'match_invitation_status_invalid_value',
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

}