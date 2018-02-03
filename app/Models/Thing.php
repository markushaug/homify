<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 11:33:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Thing
 * 
 * @property int $id
 * @property string $thing
 * @property string $thingType
 * @property string $binding
 * @property string $password
 * @property string $default_on
 * @property string $default_off
 * @property string $protocol
 * @property string $ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $state
 * @property int $room_id
 * 
 * @property \App\Models\Room $room
 *
 * @package App\Models
 */
class Thing extends Eloquent
{
	protected $casts = [
		'room_id' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'thing',
		'thingType',
		'binding',
		'password',
		'default_on',
		'default_off',
		'protocol',
		'ip',
		'state',
		'room_id'
	];

	public function room()
	{
		return $this->belongsTo(\App\Models\Room::class);
	}
}
