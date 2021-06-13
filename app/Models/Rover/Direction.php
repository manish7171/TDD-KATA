<?php

namespace App\Models\Rover;

abstract class Direction
{
    abstract public function value();

    abstract public function right();

    abstract public function left();
}