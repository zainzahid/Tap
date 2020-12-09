<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappTwilioNumber
 * 
 * @property int $id
 * @property string|null $service_type
 * @property string $client_name
 * @property string $number
 * @property string|null $twilio_sid
 * @property string|null $twilio_token
 * @property string|null $email
 * @property string $is_default
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappTwilioNumber extends Model
{
	protected $table = 'tapp_twilio_number';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $hidden = [
		'twilio_token'
	];

	protected $fillable = [
		'service_type',
		'client_name',
		'number',
		'twilio_sid',
		'twilio_token',
		'email',
		'is_default',
		'date_time'
	];
}
