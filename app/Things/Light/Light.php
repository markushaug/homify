<?php

namespace App\Things\Light;


use App\Things\Thing;

/**
 * Class Light
 * @package App\Things\Light
 */
abstract class Light extends Thing
{

    /**
     * @return mixed
     */
    abstract public function on();

    /**
     * @return mixed
     */
    abstract public function off();

}