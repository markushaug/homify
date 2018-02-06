<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Feb 2018 18:03:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Room
 * 
 * @property int $id
 * @property string $room
 * @property string $roomName
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $things
 *
 * @package App\Models
 */
class Room extends Eloquent
{
	protected $fillable = [
		'room',
		'roomName',
		'description'
	];

	public function things()
	{
		return $this->hasMany(\App\Models\Thing::class);
	}
}
