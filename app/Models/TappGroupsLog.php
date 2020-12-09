<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappGroupsLog
 * 
 * @property int $id
 * @property string $group_name
 * @property string $number
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $country
 * @property Carbon $date_time
 * @property Carbon|null $unsub_date
 *
 * @package App\Models
 */
class TappGroupsLog extends Model
{
	protected $table = 'tapp_groups_log';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int'
	];

	protected $dates = [
		'date_time',
		'unsub_date'
	];

	protected $fillable = [
		'id',
		'group_name',
		'number',
		'first_name',
		'last_name',
		'email',
		'country',
		'date_time',
		'unsub_date'
	];
}
