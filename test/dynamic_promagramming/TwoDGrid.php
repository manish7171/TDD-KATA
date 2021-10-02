
<?php


use PHPUnit\Framework\TestCase as TestCase;


class TwoDGrid extends TestCase 
{
    /**
     * Say that you are a traveller on 2D grid. You begin in the top-left corner
     * and your goal is to travel to the bottom-right corner. 
     *
     * You may only move down and right.
     *
     * In how many ways can you  travel to the goal on a grid with dimensions 
     * m * n.
     * 
     *
     * */
    public function test_should_pass()
    {
        var_dump($this->gridTraveller2(18,18)); 
    }

    private function gridTraveller($m, $n)
    {
        if ( ($m == 1) && ($n == 1) ) return 1;
        if ( ($m == 0) || ($n == 0) ) return 0;

       return $this->gridTraveller($m-1, $n) + $this->gridTraveller($m, $n-1); 
    }
    
    private function gridTraveller2($m, $n, &$memo = [])
    {
        //memorize
        if ( count($memo) > 0 && (isset($memo[$m][$n]) ) ) {
            return $memo[$m][$n];
        }
        
        if ( count($memo) > 0 && (isset($memo[$n][$m]) ) ) {
            return $memo[$n][$m];
        }
        if ( ($m == 1) && ($n == 1) ) return 1;
        if ( ($m == 0) || ($n == 0) ) return 0;

        $memo[$m][$n] = $this->gridTraveller2($m-1, $n, $memo) + $this->gridTraveller2($m, $n-1, $memo); 
        return $memo[$m][$n];
    }
}
