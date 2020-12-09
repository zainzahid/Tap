<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappSentMsg
 * 
 * @property int $id
 * @property string|null $service_type
 * @property string $sms_number
 * @property string $message
 * @property string|null $twilio_num
 * @property string $images
 * @property string $bulk_name
 * @property Carbon $date_time
 * @property Carbon $scheduled_time
 *
 * @package App\Models
 */
class TappSentMsg extends Model
{
	protected $table = 'tapp_sent_msg';
	public $timestamps = false;

	protected $dates = [
		'date_time',
		'scheduled_time'
	];

	protected $fillable = [
		'service_type',
		'sms_number',
		'message',
		'twilio_num',
		'images',
		'bulk_name',
		'date_time',
		'scheduled_time'
	];
}
