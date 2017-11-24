<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 07 Nov 2017 19:37:23 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;


/**
 * Class Thing
 * 
 * @property int $id
 * @property string $thing
 * @property string $password
 * @property string $default_on
 * @property string $default_off
 * @property string $protocol
 * @property string $ip
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Thing extends Eloquent
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'thing',
		'password',
		'default_on',
		'default_off',
		'protocol',
		'ip'
	];
}
