<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 03 Feb 2018 11:33:55 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Room
 * 
 * @property int $id
 * @property string $room
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
		'description'
	];

	public function things()
	{
		return $this->hasMany(\App\Models\Thing::class);
	}
}
