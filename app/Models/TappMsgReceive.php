<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappMsgReceive
 * 
 * @property int $id
 * @property string|null $sender
 * @property string|null $body
 * @property Carbon|null $date_time
 * @property string|null $read_status
 * @property string $mediaUrl
 * @property string|null $msg_read
 * @property string $twilio_num
 *
 * @package App\Models
 */
class TappMsgReceive extends Model
{
	protected $table = 'tapp_msg_receive';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'sender',
		'body',
		'date_time',
		'read_status',
		'mediaUrl',
		'msg_read',
		'twilio_num'
	];
}
