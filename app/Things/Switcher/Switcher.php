<?php

namespace App\Things\Switcher;


use App\Things\Thing;

abstract class Switcher extends Thing
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


?>
