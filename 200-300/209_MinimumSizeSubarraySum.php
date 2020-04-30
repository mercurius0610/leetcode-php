<?php
class Solution {

    /**
     * @param Integer $s
     * @param Integer[] $nums
     * @return Integer
     */
    function minSubArrayLen($s, $nums) {
        if(reset($nums)>=$s) return 1;
        $sum=0;
        $minL=PHP_INT_MAX;
        $i=0;
        for($j=0;$j<count($nums);$j++) {
            if($nums[$j]>=$s) return 1;
            $sum+=$nums[$j];
            if($s<=$sum) {
                while ($i<$j && $sum - $nums[$i] >= $s) {
                    $sum-=$nums[$i];
                    $i++;
                }
                $minL=min($j-$i+1, $minL);
            }
        }
        return $minL==PHP_INT_MAX ? 0 : $minL;
    }
}
$s = 7;
$nums = [2,3,1,2,4,3];
$i=new Solution();
print_r($i->minSubArrayLen($s, $nums));
