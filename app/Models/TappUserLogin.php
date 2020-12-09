<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappUserLogin
 * 
 * @property int $id
 * @property string|null $user_name
 * @property string $email
 * @property string $password
 * @property string $type
 * @property Carbon|null $date_time
 * @property string $profile_image
 *
 * @package App\Models
 */
class TappUserLogin extends Model
{
	protected $table = 'tapp_user_login';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'user_name',
		'email',
		'password',
		'type',
		'date_time',
		'profile_image'
	];
}
