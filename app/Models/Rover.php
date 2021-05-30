<?php 
namespace App\Models;

class Rover
{

    private $x = 0;
    private $y = 0;
    private $coordinate;
    private $direction ;
    private $grid;


    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
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


}
