<?php

namespace App\Models;

class Obstacle
{
    public $x, $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}