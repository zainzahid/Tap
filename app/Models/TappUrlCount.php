<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappUrlCount
 * 
 * @property int $id
 * @property string|null $url
 * @property int $link_id
 * @property string|null $link_count
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappUrlCount extends Model
{
	protected $table = 'tapp_url_count';
	public $timestamps = false;

	protected $casts = [
		'link_id' => 'int'
	];

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'url',
		'link_id',
		'link_count',
		'date_time'
	];
}
