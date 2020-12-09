<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappBlacklist
 * 
 * @property string $number
 * @property string $keyword
 * @property Carbon $datetime
 * @property int $id
 *
 * @package App\Models
 */
class TappBlacklist extends Model
{
	protected $table = 'tapp_blacklist';
	public $timestamps = false;

	protected $dates = [
		'datetime'
	];

	protected $fillable = [
		'number',
		'keyword',
		'datetime'
	];
}
