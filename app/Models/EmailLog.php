<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailLog
 * 
 * @property int $id
 * @property string $email
 * @property string|null $sent_email_id
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class EmailLog extends Model
{
	protected $table = 'email_log';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'sent_email_id'
	];
}
