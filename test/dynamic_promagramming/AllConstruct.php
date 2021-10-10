
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
        var_dump($this->canConst('abcdef',['ab', 'abc', 'cd', 'def', 'abcd', 'ef', 'c']));
//        var_dump($this->canConst('purple',['purp', 'p', 'ur', 'le', 'purpl']));
        //var_dump($this->canConst('eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee',['e', 'eeeee', 'eeeeeeeeeee', 'eeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeee']));
    }

    public function canConst($target, $wordBank, &$memo=[])
    {
        //if(isset($memo[$target])) return $memo[$target];

        if ($target === '') {
            return true; 
        }
        $result = []; 

        foreach ($wordBank as $word) {
            if (strpos($target, $word) === 0) {
                    $return = $this->canConst(substr($target, strlen($word)), $wordBank,$memo);
                    $result[] = array_map(function($r) use ($word) {
                        return [$word,$r];
                    },[$return]);
                    //$memo[$target] = array_merge([$word],[$return]);                    
            }
        }

        //$memo[$target] = $result;
        return $result; 
    }
}
