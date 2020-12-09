<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappResetPass
 * 
 * @property int $id
 * @property string $email
 * @property string $unique_key
 * @property Carbon|null $date_time
 *
 * @package App\Models
 */
class TappResetPass extends Model
{
	protected $table = 'tapp_reset_pass';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'email',
		'unique_key',
		'date_time'
	];
}
