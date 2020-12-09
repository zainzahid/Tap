<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappEmailConfiguaration
 * 
 * @property int $id
 * @property string $host_type
 * @property string $host_name
 * @property string $username
 * @property string $password
 * @property string $from_email
 * @property string $from_name
 * @property string $add_reply_to
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappEmailConfiguaration extends Model
{
	protected $table = 'tapp_email_configuaration';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'host_type',
		'host_name',
		'username',
		'password',
		'from_email',
		'from_name',
		'add_reply_to',
		'date_time'
	];
}
