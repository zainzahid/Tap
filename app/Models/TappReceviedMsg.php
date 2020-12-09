<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappReceviedMsg
 * 
 * @property int $id
 * @property string|null $service_type
 * @property string $sms_number
 * @property string $twilio_num
 * @property string $msg_type
 * @property string $message
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappReceviedMsg extends Model
{
	protected $table = 'tapp_recevied_msg';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'service_type',
		'sms_number',
		'twilio_num',
		'msg_type',
		'message',
		'date_time'
	];
}
