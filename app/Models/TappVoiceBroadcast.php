<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappVoiceBroadcast
 * 
 * @property int $id
 * @property string $twilio_number
 * @property string $user_number
 * @property string $voice_file
 * @property string $agent_number
 * @property string|null $readyToCall
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappVoiceBroadcast extends Model
{
	protected $table = 'tapp_voice_broadcast';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'twilio_number',
		'user_number',
		'voice_file',
		'agent_number',
		'readyToCall',
		'date_time'
	];
}
