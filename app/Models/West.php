<?php

namespace App\Models;

class West extends Direction
{

    public function value()
    {
        return "W";
    }

    public function right()
    {
        return new North();
    }

    public function left()
    {
        return new South();
    }
}