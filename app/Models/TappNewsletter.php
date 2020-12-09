<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappNewsletter
 * 
 * @property int $id
 * @property string $mobile_no
 * @property string $keyword
 * @property string|null $name
 * @property string|null $email
 * @property string|null $location
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappNewsletter extends Model
{
	protected $table = 'tapp_newsletter';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'mobile_no',
		'keyword',
		'name',
		'email',
		'location',
		'date_time'
	];
}
