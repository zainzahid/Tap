<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappSingleMsg
 * 
 * @property int $id
 * @property string $sms_number
 * @property string $message
 * @property string|null $images
 * @property Carbon|null $scheduled_for
 * @property string|null $type
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappSingleMsg extends Model
{
	protected $table = 'tapp_single_msg';
	public $timestamps = false;

	protected $dates = [
		'scheduled_for',
		'date_time'
	];

	protected $fillable = [
		'sms_number',
		'message',
		'images',
		'scheduled_for',
		'type',
		'date_time'
	];
}
