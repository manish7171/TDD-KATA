
<?php


use PHPUnit\Framework\TestCase as TestCase;


class CanSumTest extends TestCase 
{
    /**
     * Write a function canSum(target, numbers) that takes in a targetSum
     * and an array of numbers  as arguments
     * 
     * The function should return  a boolean indicating whether or not it is
     * possible to  generate the targetSum using the numbers from the array
     *
     * You may use an element of the array as many times as needed.
     *
     * You may assume that all numbers are non-negative.
     *
     * */
    public function test_should_pass()
    {
        //var_dump($this->canSum(7, [2, 3])); 
        //var_dump($this->canSum(7, [5, 3, 4, 7])); 
        //var_dump($this->canSum(7, [2, 4])); 
        //var_dump($this->canSum(8, [2, 3, 5])); 
        var_dump($this->canSum(300, [7, 14])); 
    }

    private function canSum( $targetSum, $arr, &$memo=[] )
    {
        if ( isset( $memo[ $targetSum ] )) return $memo[ $targetSum ];
        
        if ( $targetSum == 0 ) return true;
        
        if ( $targetSum < 0 ) return false;

        foreach ( $arr as $a ) {
       
            $remainder = $targetSum - $a;
       
            if ( $this->canSum( $remainder, $arr, $memo ) == true ) {
      
                $memo[ $targetSum ] = true; 
     
                return true; 
            }
        }

        $memo[ $targetSum ] = false;; 
        
        return false; 
    }


}
