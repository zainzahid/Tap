<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappUrlId
 * 
 * @property int $link_id
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappUrlId extends Model
{
	protected $table = 'tapp_url_id';
	protected $primaryKey = 'link_id';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'date_time'
	];
}
