<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxProduct($nums) {
        $c_min=$c_max=$max=reset($nums);
        for($i=1;$i<count($nums);$i++){
            if($nums[$i]<0) {
                list($c_min, $c_max) = [$c_max, $c_min];
            }
            $c_max=max($c_max*$nums[$i], $nums[$i]);
            $c_min=min($c_min*$nums[$i], $nums[$i]);
            $max=max($c_max, $max);
        }
        return $max;
    }
}
//$n=[-4,-3];
//$n=[-2];
$n=[1,2,-1,-2,2,1,-2,1,4,-5,4];
$i=new Solution();
print_r($i->maxProduct($n));

