<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappStoredNumber
 * 
 * @property int $id
 * @property string $sms_number
 * @property string $message
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappStoredNumber extends Model
{
	protected $table = 'tapp_stored_numbers';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'sms_number',
		'message',
		'date_time'
	];
}
