
<?php


use PHPUnit\Framework\TestCase as TestCase;


class BestSumTest extends TestCase 
{
    /**
     *
     * 
     * You may use an element of the array as many times as needed.
     *
     * You may assume that all numbers are non-negative.
     *
     * */
    public function test_should_pass()
    {
        //($this->bestSum(7, [2, 3])); 
        //print_r($this->bestSum(7, [5, 3, 4, 7])); 
        print_r($this->bestSum(100, [1, 2, 5, 25])); 
        //var_dump($this->bestSum(7, [2, 4])); 
        //var_dump($this->bestSum(8, [2, 3, 5])); 
        //..print_r($this->bestSum(300, [3, 7, 14])); 
    }

    private function bestSum( $targetSum, $arr, &$memo=[] )
    {
        if ( array_key_exists($targetSum, $memo ) ) {
            return $memo[ $targetSum ];
        }        
        if ( $targetSum == 0 ) return [];

        if ( $targetSum < 0 ) return null;

        $shortestCombination = null;

        foreach ( $arr as $a ) {

            $remainder = $targetSum - $a;

            $remainderResult =  $this->bestSum( $remainder, $arr, $memo );

            if ( !is_null($remainderResult)) { 

                $remainderResult[] = $a; 

                $memo[$targetSum] = $remainderResult;
                
                if($shortestCombination === null || count($shortestCombination) > count($remainderResult)) {
                    $shortestCombination = $remainderResult; 
                }

                //return $remainderResult; 
            }
        }

        $memo[ $targetSum ] = $shortestCombination; 

        return $shortestCombination; 
    }


}
