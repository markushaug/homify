<?php

namespace App\Things\Speaker;


use App\Things\Thing;

/**
 * Class Speaker
 * @package App\Things\Speaker
 */
abstract class Speaker extends Thing
{
    /**
     * @var
     */
    private $speaker;

    abstract public function play();

    abstract public function pause();

}

?>