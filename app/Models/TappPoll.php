<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappPoll
 * 
 * @property int $id
 * @property string $poll_name
 * @property string $sms_number
 * @property string|null $message
 * @property string|null $type
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappPoll extends Model
{
	protected $table = 'tapp_poll';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'poll_name',
		'sms_number',
		'message',
		'type',
		'date_time'
	];
}
