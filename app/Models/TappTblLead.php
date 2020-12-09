<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappTblLead
 * 
 * @property int $id
 * @property string|null $sender
 * @property string|null $body
 * @property Carbon|null $date_time
 * @property Carbon $lead_date
 * @property string $job_title
 * @property string $job_location
 * @property string $interest_level
 * @property string $source
 * @property string $status
 * @property string|null $twilio_num
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $country
 * @property string|null $address
 * @property int|null $postal_code
 *
 * @package App\Models
 */
class TappTblLead extends Model
{
	protected $table = 'tapp_tbl_leads';
	public $timestamps = false;

	protected $casts = [
		'postal_code' => 'int'
	];

	protected $dates = [
		'date_time',
		'lead_date'
	];

	protected $fillable = [
		'sender',
		'body',
		'date_time',
		'lead_date',
		'job_title',
		'job_location',
		'interest_level',
		'source',
		'status',
		'twilio_num',
		'first_name',
		'last_name',
		'email',
		'country',
		'address',
		'postal_code'
	];
}
