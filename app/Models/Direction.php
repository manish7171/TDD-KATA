<?php

namespace App\Models;

abstract class Direction
{
    abstract public function value();

    abstract public function right();

    abstract public function left();
}