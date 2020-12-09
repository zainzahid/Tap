<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappTemplateMsg
 * 
 * @property int $id
 * @property string $title
 * @property string $message
 * @property string $temp_type
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappTemplateMsg extends Model
{
	protected $table = 'tapp_template_msg';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'title',
		'message',
		'temp_type',
		'date_time'
	];
}
