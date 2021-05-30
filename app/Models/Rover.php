<?php 
namespace App\Models;

class Rover
{

    private $x = 0;
    private $y = 0;
    private $coordinate;
    private $direction ;
    private $grid;
    private $endOfGridY = false;
    private $endOfGridX = false;

    private $obstacle;
    /**
     * @var bool
     */
    private $obstacleFound = false;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
        $this->obstacle = new Obstacle(2,2);
        $this->direction = new North();
        $this->coordinate = new Coordinate(0,0);
    }


    public function currentPosition():string
    {
        if($this->grid->obstacleFound())
        {
            return 'O:'.$this->coordinate->getX().":".$this->coordinate->getY().":".$this->direction->value();
        }
        return $this->coordinate->getX().":".$this->coordinate->getY().":".$this->direction->value();
    }

    public function execute($commands): void
    {
        foreach ( str_split( $commands ) as $command )
        {
            if( $command === "R" || $command === "L" )
            {
                $this->direction = $this->rotate($command);
            }
            else
            {
                $this->coordinate = $this->grid->getNextCoordinateFor($this->coordinate, $this->direction);
            }
        }

    }

    private function rotate($command)
    {
        if($command === "R")
        {
            return ($this->direction->right());
        }
        return ($this->direction->left());

    }

    private function checkForObstacle(): void
    {
        if($this->x === $this->obstacle->x && $this->y === $this->obstacle->y )
        {
            $this->obstacleFound = true;
        }
        else
        {
            $this->obstacleFound = false;
        }


    }

/*    private function rotateRight()
    {
        if( $this->direction === "N") {
            return "E";
        }
        if( $this->direction === "E") {
            return "S";
        }
        if( $this->direction === "W") {
            return "N";
        }
        if( $this->direction === "S") {
            return "W";
        }

    }

    private function rotateLeft()
    {
        if( $this->direction === "N") {
            return "W";
        }
        if( $this->direction === "W") {
            return "S";
        }
        if( $this->direction === "S") {
            return "E";
        }
        if( $this->direction === "E") {
            return "N";
        }
    }*/

}
