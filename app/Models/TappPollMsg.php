<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappPollMsg
 * 
 * @property int $id
 * @property string $sms_number
 * @property string $message
 * @property Carbon|null $scheduled_for
 * @property Carbon $date_time
 * @property int|null $poll_id
 *
 * @package App\Models
 */
class TappPollMsg extends Model
{
	protected $table = 'tapp_poll_msg';
	public $timestamps = false;

	protected $casts = [
		'poll_id' => 'int'
	];

	protected $dates = [
		'scheduled_for',
		'date_time'
	];

	protected $fillable = [
		'sms_number',
		'message',
		'scheduled_for',
		'date_time',
		'poll_id'
	];
}
