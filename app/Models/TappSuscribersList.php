<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappSuscribersList
 * 
 * @property int $id
 * @property string $list_name
 * @property string $description
 * @property string|null $numbers
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappSuscribersList extends Model
{
	protected $table = 'tapp_suscribers_list';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'list_name',
		'description',
		'numbers',
		'date_time'
	];
}
