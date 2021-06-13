<?php

namespace App\Models\Rover;

class Grid
{
    const GRID_MAX_HEIGH = 10;
    const GRID_MAX_WIDTH = 10;

    private $obstacle;

    private $obstacleFound = false;

    public function __construct()
    {

    }

    public function setObstacle(Coordinate $coordinate)
    {
        $this->obstacle = $coordinate;
    }

    public function obstacleFound()
    {
        return $this->obstacleFound;
    }

    public function getNextCoordinateFor(Coordinate $coordinate, Direction $direction)
    {
        $x = $coordinate->getX();
        $y = $coordinate->getY();

        if(!$this->obstacleFound)
        {
            if ($direction->value() === "N") {
                $y = ($y + 1) % self::GRID_MAX_HEIGH;
            }
            if ($direction->value() === "S") {
                if ($y - 1 < 0) {
                    $y += self::GRID_MAX_HEIGH - 1;
                } else {
                    --$y;
                }
            }
            if ($direction->value() === "E") {
                $x = ($x + 1) % self::GRID_MAX_WIDTH;
            }
            if ($direction->value() === "W") {
                if ($x - 1 < 0) {
                    $x += 9;
                } else {
                    --$x;
                }
            }
        }
        $this->checkForObstacle($x,$y);

        return new Coordinate($x, $y);
    }

    private function checkForObstacle(int $x, int $y)
    {

        if(isset($this->obstacle))
        {
            /*print_r($x);
            print_r('asdf'.$y);*/

            if($x === $this->obstacle->getX() && $y === $this->obstacle->getY())
            {
                $this->obstacleFound = true;
            }
        }

    }
}