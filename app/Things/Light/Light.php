<?php

namespace App\Things\Light;


use App\Things\Thing;

/**
 * Class Light
 * @package App\Things\Light
 */
abstract class Light extends Thing implements \App\Things\ifSlidable
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