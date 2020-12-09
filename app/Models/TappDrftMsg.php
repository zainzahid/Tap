<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappDrftMsg
 * 
 * @property int $id
 * @property string $message
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappDrftMsg extends Model
{
	protected $table = 'tapp_drft_msg';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'message',
		'date_time'
	];
}
