
<?php


use PHPUnit\Framework\TestCase as TestCase;


class CanConstruct extends TestCase 
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
        //var_dump($this->canConst('abcdef',['ab', 'abce', 'cd', 'def', 'abcd']));
        var_dump($this->canConst('eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee',['e', 'eeeee', 'eeeeeeeeeee', 'eeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeee']));
    }

    public function canConst($target, $wordBank, &$memo=[])
    {
        if(isset($memo[$target])) return $memo[$target];

        if ($target === '') {
            return true; 
        }
        
        foreach ($wordBank as $word) {
            if (strpos($target, $word) === 0) {
                if ($this->canConst(substr($target, strlen($word)), $wordBank) === true) {
                    $memo[$target] = true;                    
                    return true; 
                } 
            }
        }

        $memo[$target] = false;
        return false; 
    }
}
