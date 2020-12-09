<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TappCountry
 * 
 * @property int $id
 * @property string $sortname
 * @property string $name
 * @property int $phonecode
 *
 * @package App\Models
 */
class TappCountry extends Model
{
	protected $table = 'tapp_countries';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'phonecode' => 'int'
	];

	protected $fillable = [
		'id',
		'sortname',
		'name',
		'phonecode'
	];
}
