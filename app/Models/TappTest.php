<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappTest
 * 
 * @property int $id
 * @property string $sms_number
 * @property string $twilio_num
 * @property string $message
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappTest extends Model
{
	protected $table = 'tapp_test';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'sms_number',
		'twilio_num',
		'message',
		'date_time'
	];
}
