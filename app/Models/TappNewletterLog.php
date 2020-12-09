<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappNewletterLog
 * 
 * @property int $id
 * @property string $mobile_no
 * @property string $keyword
 * @property string|null $mode
 * @property Carbon|null $unsub_date
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappNewletterLog extends Model
{
	protected $table = 'tapp_newletter_log';
	public $timestamps = false;

	protected $dates = [
		'unsub_date',
		'date_time'
	];

	protected $fillable = [
		'mobile_no',
		'keyword',
		'mode',
		'unsub_date',
		'date_time'
	];
}
