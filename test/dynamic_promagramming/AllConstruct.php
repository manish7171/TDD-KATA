
<?php


use PHPUnit\Framework\TestCase as TestCase;


class AllConstruct extends TestCase 
{
    /*
     *
     * Write a function canConstruct(target, wordBank) that accepts  a target
     * string and an array of strings.
     *
     * The function should return a boolean indicating whether or not the target 
     *
     * can be constructed by concatenating elements of the wordBank array.
     *
     * You may reuse the element of wordBank as many times as needed.
     *
     *
     * */
    public function test_should_pass()
    {
        print_r($this->canConst('abcdef',['ab', 'abc', 'cd', 'def', 'abcd', 'ef', 'c']));
//        var_dump($this->canConst('purple',['purp', 'p', 'ur', 'le', 'purpl']));
        //var_dump($this->canConst('eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee',['e', 'eeeee', 'eeeeeeeeeee', 'eeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeee']));
    }

    public function canConst($target, $wordBank, &$memo=[])
    {
        if(isset($memo[$target])) return $memo[$target];

        if ($target === '') {
            return []; 
        }

        $result = []; 

        foreach ($wordBank as $word) {
            if ( strpos($target, $word) === 0 ) {
                $suffix =  substr($target, strlen($word));
                $suffixWay = $this->canConst( $suffix, $wordBank, $memo );
                $result1[] = [$word];
                $result1[] = $suffixWay;
                $result[] = array_merge(...$result1);
                    //$result[] = array_map(function($r) use ($word) {
                     //   return [$word,$r];
                    //},[$return]);
                    //array_push($return, [$word]); 
                    //$result = array_push([$return], [$word]);//$memo[$target];                   
                    
            }
        }

        $memo[$target] = $result;
        return $result; 
    }
}
