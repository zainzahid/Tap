<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappSentEmail
 * 
 * @property int $id
 * @property string|null $service_type
 * @property string $email
 * @property string $subject
 * @property string $message
 * @property string|null $twilio_num
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappSentEmail extends Model
{
	protected $table = 'tapp_sent_email';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'service_type',
		'email',
		'subject',
		'message',
		'twilio_num',
		'date_time'
	];
}
