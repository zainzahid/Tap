<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappSentEmailLog
 * 
 * @property int $id
 * @property string $email
 * @property string|null $service_type
 * @property string $twilio_num
 * @property string $message
 * @property string|null $url
 * @property string|null $images
 * @property Carbon|null $scheduled_for
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappSentEmailLog extends Model
{
	protected $table = 'tapp_sent_email_log';
	public $timestamps = false;

	protected $dates = [
		'scheduled_for',
		'date_time'
	];

	protected $fillable = [
		'email',
		'service_type',
		'twilio_num',
		'message',
		'url',
		'images',
		'scheduled_for',
		'date_time'
	];
}
