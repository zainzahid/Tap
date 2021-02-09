<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\User;

/**
 * Class TappSentMsgFailed
 * 
 * @property int $id
 * @property string|null $service_type
 * @property string $sms_number
 * @property string $twilio_num
 * @property string $message
 * @property string|null $url
 * @property string|null $images
 * @property string $bulk_name
 * @property Carbon|null $scheduled_for
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappSentMsgFailed extends Model
{
	protected $table = 'tapp_sent_msg_failed';
	public $timestamps = false;

	protected $dates = [
		'scheduled_for',
		'date_time'
	];

	protected $fillable = [
		'service_type',
		'sms_number',
		'twilio_num',
		'message',
		'url',
		'images',
		'bulk_name',
		'scheduled_for',
		'date_time',
		'user_id'
	];

	public function user()
    {
        return $this->belongsTo(User::class);
    }
}
