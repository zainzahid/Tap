<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TableDatum
 * 
 * @property int $id
 * @property string|null $sender
 * @property string|null $body
 * @property Carbon|null $date_time
 * @property string|null $sending_status
 *
 * @package App\Models
 */
class TableDatum extends Model
{
	protected $table = 'table_data';
	public $timestamps = false;

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'sender',
		'body',
		'date_time',
		'sending_status'
	];
}
