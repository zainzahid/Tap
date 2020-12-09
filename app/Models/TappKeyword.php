<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappKeyword
 * 
 * @property int $id
 * @property string $keyword
 * @property string $client_name
 * @property string $client_email
 * @property string|null $client_address
 * @property string $num_of_times
 * @property Carbon $expiry_dates
 * @property string $twilio_num
 * @property string $left_msg
 * @property string $message
 * @property Carbon $date_time
 * @property string|null $filename
 *
 * @package App\Models
 */
class TappKeyword extends Model
{
	protected $table = 'tapp_keywords';
	public $timestamps = false;

	protected $dates = [
		'expiry_dates',
		'date_time'
	];

	protected $fillable = [
		'keyword',
		'client_name',
		'client_email',
		'client_address',
		'num_of_times',
		'expiry_dates',
		'twilio_num',
		'left_msg',
		'message',
		'date_time',
		'filename'
	];
}
