
<?php


use PHPUnit\Framework\TestCase as TestCase;

use App\leetcode\TwoSum;

class FibTest extends TestCase 
{
    
    public function params() {
        // test with this values
        return array(
            array( [0,1], [3,3], 6),
            //array( [0,1], [2,7,11,15], 9),
            //array( [1, 2], [3,2,4], 6),
            // ...
        );
    }
     /**
     * @dataProvider params
     * @param $input
     * @param $expectedResult
     */

    public function test_should_pass($expected, $input, $target)
    {
        var_dump($this->fib2(8));
    }

    public function fib($n)
    {
        if ($n <= 2) return 1;
        return $this->fib($n-1) + $this->fib($n-2); 
    }
    
    public function fib2($n)
    {
        $n1 = 1;
        $n2 = 1;
        $p = 3;
        while($p <= $n) {
            $curr = $n1 + $n2;
            $n1 = $n2;
            $n2 = $curr;
            $p++; 
        }
        return $curr;
    }

    public function fib3( $n, &$memo = [])
    {
        //memorization
        if(array_key_exists($n,$memo)) return $memo[$n]; 
        
        if ($n <= 2) {
            return 1;
        }

        $memo[$n] = $this->fib3($n-1,$memo) + $this->fib3($n-2,$memo);

        return $memo[$n]; 
    }
}
