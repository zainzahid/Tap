<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappList
 * 
 * @property int $id
 * @property string $list_name
 * @property string $number
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappList extends Model
{
	protected $table = 'tapp_list';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'list_name',
		'number',
		'date_time'
	];
}
