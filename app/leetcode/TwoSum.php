<?php
namespace App\leetcode;
/***
 * 
 * Given an array of integers nums and an integer target, return indices of the two numbers such that they add up to target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.
 * **/

class TwoSum 
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function main($nums, $target) {
        for($i = 0; $i < count($nums); $i++) {
            $first = $nums[$i];
            for($j = $i+1 ; $j < count($nums) ; $j++) {
                if ($first + $nums[$j] == $target) {
                    return [$i,$j];
                }
            }
        }
    }
}

