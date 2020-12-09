<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EmailSent
 * 
 * @property int $id
 * @property string $email
 * @property string|null $sent_email_id
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class EmailSent extends Model
{
	protected $table = 'email_sent';
	public $timestamps = false;

	protected $fillable = [
		'email',
		'sent_email_id'
	];
}
