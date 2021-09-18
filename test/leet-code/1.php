<?php

/* Given two integer arrays nums1 and nums2, return an array of their 
 * intersection. Each element in the result must appear as many times as 
 * it shows in both arrays and you may return the result in any order.
 * */

$arr1 = [1,2,2,1];
$arr2 = [2,2];
/*$arr1 = [4,9,5];
$arr2 = [9,4,9,8,4];*/


$m = count($arr1);
$n = count($arr2);

function binarySearch($arr, $l, $r, $x) {
    if ($r >= $l)
    {
        $mid = (int)($l + ($r - $l)/2);
 
        // If the element is present at the middle itself
        if ($arr[$mid] == $x) return $mid;
 
        // If element is smaller than mid, then it can only
        // be present in left subarray
        if ($arr[$mid] > $x)
        return binarySearch($arr, $l, $mid - 1, $x);
 
        // Else the element can only be present in right subarray
        return binarySearch($arr, $mid + 1, $r, $x);
    }
 
    // We reach here when element is not present in array
    return -1;
}
if ($m > $n)
{
    $tempp = $arr1;
    $arr1 = $arr2;
    $arr2 = $tempp;

    $temp = $m;
    $m = $n;
    $n = $temp;
}

sort($arr1);
$result = [];
for ($i = 0; $i < $n; $i++) {
    if (binarySearch($arr1, 0, $m - 1, $arr2[$i]) != -1) {
        $result[] = $arr2[$i];
    } 
}
print_r($result);
