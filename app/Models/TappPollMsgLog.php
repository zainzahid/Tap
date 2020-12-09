<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappPollMsgLog
 * 
 * @property int $id
 * @property string $sms_number
 * @property string $message
 * @property Carbon|null $scheduled_for
 * @property Carbon $date_time
 * @property int|null $poll_id
 * @property Carbon|null $msg_sent_time
 *
 * @package App\Models
 */
class TappPollMsgLog extends Model
{
	protected $table = 'tapp_poll_msg_log';
	public $timestamps = false;

	protected $casts = [
		'poll_id' => 'int'
	];

	protected $dates = [
		'scheduled_for',
		'date_time',
		'msg_sent_time'
	];

	protected $fillable = [
		'sms_number',
		'message',
		'scheduled_for',
		'date_time',
		'poll_id',
		'msg_sent_time'
	];
}
