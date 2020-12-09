<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappMessageNewsletter
 * 
 * @property int $id
 * @property string $message
 * @property Carbon|null $message_date
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappMessageNewsletter extends Model
{
	protected $table = 'tapp_message_newsletter';
	public $timestamps = false;

	protected $dates = [
		'message_date',
		'date_time'
	];

	protected $fillable = [
		'message',
		'message_date',
		'date_time'
	];
}
