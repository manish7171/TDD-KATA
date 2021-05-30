<?php

namespace App\Models;

class East extends Direction
{

    public function right()
    {
        return new South();
    }

    public function left()
    {
        return new North();
    }

    public function value()
    {
        return "E";
    }
}