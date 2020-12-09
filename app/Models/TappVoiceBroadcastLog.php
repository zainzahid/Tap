<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappVoiceBroadcastLog
 * 
 * @property int $id
 * @property string $twilio_number
 * @property string $user_number
 * @property string $voice_file
 * @property string $recording_url
 * @property string $agent_number
 * @property string $is_called
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappVoiceBroadcastLog extends Model
{
	protected $table = 'tapp_voice_broadcast_logs';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'twilio_number',
		'user_number',
		'voice_file',
		'recording_url',
		'agent_number',
		'is_called',
		'date_time'
	];
}
