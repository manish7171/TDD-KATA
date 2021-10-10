
<?php


use PHPUnit\Framework\TestCase as TestCase;


class HowSumTest extends TestCase 
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
        //($this->howSum(7, [2, 3])); 
        print_r($this->howSum(7, [5, 3, 4, 7])); 
        //var_dump($this->howSum(7, [2, 4])); 
        //var_dump($this->howSum(8, [2, 3, 5])); 
        //print_r($this->howSum(300, [3, 7, 14])); 
    }

    private function howSum( $targetSum, $arr, &$memo=[] )
    {
        if ( array_key_exists($targetSum, $memo ) ) {
            return $memo[ $targetSum ];
        }        
        if ( $targetSum == 0 ) return [];

        if ( $targetSum < 0 ) return null;

        foreach ( $arr as $a ) {

            $remainder = $targetSum - $a;

            $remainderResult =  $this->howSum( $remainder, $arr, $memo );

            if ( !is_null($remainderResult)) { 

                $remainderResult[] = $a; 

                $memo[$targetSum] = $remainderResult;
                return $remainderResult; 
            }
        }

        $memo[ $targetSum ] = null; 

        return null; 
    }


}
