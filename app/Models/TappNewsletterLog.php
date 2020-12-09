<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappNewsletterLog
 * 
 * @property int $id
 * @property string $mobile_no
 * @property string $keyword
 * @property string|null $name
 * @property string|null $email
 * @property string|null $location
 * @property Carbon $date_time
 * @property Carbon|null $unsub_date
 *
 * @package App\Models
 */
class TappNewsletterLog extends Model
{
	protected $table = 'tapp_newsletter_log';
	public $timestamps = false;

	protected $dates = [
		'date_time',
		'unsub_date'
	];

	protected $fillable = [
		'mobile_no',
		'keyword',
		'name',
		'email',
		'location',
		'date_time',
		'unsub_date'
	];
}
