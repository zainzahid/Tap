<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappPredraftedMessage
 * 
 * @property int $id
 * @property string $message
 * @property Carbon $date_time
 * @property string $keywords
 *
 * @package App\Models
 */
class TappPredraftedMessage extends Model
{
	protected $table = 'tapp_predrafted_message';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'message',
		'date_time',
		'keywords'
	];
}
