<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function maxSubArray($nums) {
        $dp = array_fill(0, count($nums), 0);
        $dp[0]=$max=reset($nums);
        for($i=0;$i<count($nums);$i++) {
            $dp[$i] = $nums[$i] + ($dp[$i-1]>0?$dp[$i-1]:0);
            $max = max($max, $dp[$i]);
        }
        return $max;
    }
}
$a=[1,2];
$i=new Solution();
print_r($i->maxSubArray($a));