<?php


use PHPUnit\Framework\TestCase as TestCase;

use App\leetcode\TwoSum;

class TwoSumTest extends TestCase 
{
    
    public function params() {
        // test with this values
        return array(
            array( [0,1], [3,3], 6),
            array( [0,1], [2,7,11,15], 9),
            array( [1, 2], [3,2,4], 6),
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
        $this->assertEquals($expected, (new TwoSum())->main( $input, $target));
    
    }
}
