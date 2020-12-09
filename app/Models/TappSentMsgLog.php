<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappSentMsgLog
 * 
 * @property int $id
 * @property string $sms_number
 * @property string|null $service_type
 * @property string $twilio_num
 * @property string $message
 * @property string|null $url
 * @property string|null $images
 * @property string $bulk_name
 * @property Carbon|null $scheduled_for
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappSentMsgLog extends Model
{
	protected $table = 'tapp_sent_msg_log';
	public $timestamps = false;

	protected $dates = [
		'scheduled_for',
		'date_time'
	];

	protected $fillable = [
		'sms_number',
		'service_type',
		'twilio_num',
		'message',
		'url',
		'images',
		'bulk_name',
		'scheduled_for',
		'date_time'
	];
}
