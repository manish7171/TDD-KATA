<?php

namespace App\Models\Rover;

class North extends Direction
{

    public function right()
    {
        return new East();
    }

    public function left()
    {
        return new West();
    }

    public function value()
    {
        return "N";
    }
}