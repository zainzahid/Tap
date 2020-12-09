<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappReceivedResponse
 * 
 * @property int $id
 * @property string $mobile_no
 * @property string $keyword
 * @property Carbon $date_time
 * @property string|null $Poll_Name
 *
 * @package App\Models
 */
class TappReceivedResponse extends Model
{
	protected $table = 'tapp_received_responses';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'mobile_no',
		'keyword',
		'date_time',
		'Poll_Name'
	];
}
