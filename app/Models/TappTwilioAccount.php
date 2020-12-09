<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappTwilioAccount
 * 
 * @property int $id
 * @property string|null $service_type
 * @property string $twilio_sid
 * @property string $twilio_token
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappTwilioAccount extends Model
{
	protected $table = 'tapp_twilio_account';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $hidden = [
		'twilio_token'
	];

	protected $fillable = [
		'service_type',
		'twilio_sid',
		'twilio_token',
		'date_time'
	];
}
