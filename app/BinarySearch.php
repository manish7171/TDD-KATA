<?php
namespace App;

class BinarySearch
{
/*	public function search($arr, $value) //recursion
	{
		sort($arr);

		if(count($arr) == 1 ) {
			if($arr[0] == $value) return true;
			return false;
		}

		$midPoint = (int) round(count($arr)/2);

        if ($arr[$midPoint] == $value) {
			return true;
		} else if ($arr[$midPoint] > $value) {
			$newArr = [];
			for ( $i = 0; $i < $midPoint; $i++ ) {
					$newArr[] = $arr[$i];	
			}
			return $this->search($newArr, $value);
		} else {
			$newArr = [];
			
			for ( $i = ($midPoint); $i < (count($arr)); $i++ ) {
				$newArr[] = $arr[$i];	
			}
			//$this->dd($newArr);
			return $this->search($newArr, $value);
		}
		return false;
	}*/

    public function search($arr,$value) // while loop
    {
    	sort($arr);
    	$left = 0;
    	$right = (count($arr)-1);
    	$return = false;
    	while( $left <= $right && !$return) {
    		$mid = int (round($left + $right)/2);
    		if ($arr[$mid] == $value) {
    			$return = true;
    		} elseif ($arr[$mid] < $value) {
    			$left = $mid + 1;
    		} else {
				$right = $mid + 1;
    		}
    	}

    	return $return;
    }

    /*public function search($arr, $value) { //linear search
    	$result = false;
    	for($i = 0 ;$i < count($arr); $i++) {
    		if($arr[$i] == $value) {
    			$result = true;
    			break;
    		}
    	}
    	return $result;
    }*/

    private function dd($value)
    {
    	if ( is_array($value) ) {
    		var_dump($value);
    		die;
    	}
    	echo $value;
    	die;
    }
}
