<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappUnsubKeyword
 * 
 * @property int $id
 * @property string $keyword
 * @property string $message
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappUnsubKeyword extends Model
{
	protected $table = 'tapp_unsub_keywords';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'keyword',
		'message',
		'date_time'
	];
}
