<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappGroup
 * 
 * @property int $id
 * @property string $group_name
 * @property string $number
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $country
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappGroup extends Model
{
	protected $table = 'tapp_groups';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'group_name',
		'number',
		'first_name',
		'last_name',
		'email',
		'country',
		'date_time'
	];
}
