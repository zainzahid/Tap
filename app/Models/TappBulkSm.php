<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappBulkSm
 * 
 * @property int $id
 * @property string $list_name
 * @property string $mobile_number
 * @property string $number
 * @property string $message
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappBulkSm extends Model
{
	protected $table = 'tapp_bulk_sms';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'list_name',
		'mobile_number',
		'number',
		'message',
		'date_time'
	];
}
