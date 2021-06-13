<?php

namespace App\Models\Rover;

class South extends Direction
{

    public function value()
    {
        return "S";
    }

    public function right()
    {
        return new West();
    }

    public function left()
    {
        return new East();
    }
}