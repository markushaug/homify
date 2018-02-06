<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 06 Feb 2018 18:03:38 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Rule
 * 
 * @property int $id
 * @property string $ruleName
 * @property string $thingListener
 * @property string $jsonRule
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Rule extends Eloquent
{
	protected $fillable = [
		'ruleName',
		'thingListener',
		'jsonRule'
	];
}
