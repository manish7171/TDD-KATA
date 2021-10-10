
<?php


use PHPUnit\Framework\TestCase as TestCase;


class TwoSumIndices extends TestCase 
{
    /**
     * Input: nums = [2,7,11,15], target = 9
Output: [0,1]
     * 
     * You may use an element of the array as many times as needed.
     *
     * You may assume that all numbers are non-negative.
     *
     * */
    public function test_should_pass()
    {
        //($this->twoSum(7, [2, 3])); 
        print_r($this->twoSum(7, [5, 3, 4, 7])); 
        //print_r($this->twoSum(100, [1, 2, 5, 25])); 
        //var_dump($this->twoSum(7, [2, 4])); 
        //var_dump($this->twoSum(8, [2, 3, 5])); 
        //..print_r($this->twoSum(300, [3, 7, 14])); 
    }

    private function twoSum( $targetSum, $arr, &$memo=[] )
    {
               
        if ( $targetSum == 0 ) return [];

        if ( $targetSum < 0 ) return null;


        foreach ( $arr as $key=>$a ) {

            $remainder = $targetSum - $a;

            $remainderResult =  $this->twoSum( $remainder, $arr, $memo );

            if ( !is_null($remainderResult)) { 

                $remainderResult[] = $key; 
                return $remainderResult;
            }
        }

        return null; 
    }


}
