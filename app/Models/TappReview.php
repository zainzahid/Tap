<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TappReview
 * 
 * @property string $name
 * @property string $email
 * @property int|null $rating
 * @property string|null $feedback
 * @property Carbon $date_time
 *
 * @package App\Models
 */
class TappReview extends Model
{
	protected $table = 'tapp_reviews';
	protected $primaryKey = 'email';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'rating' => 'int'
	];

	protected $dates = [
		'date_time'
	];

	protected $fillable = [
		'name',
		'rating',
		'feedback',
		'date_time'
	];
}
