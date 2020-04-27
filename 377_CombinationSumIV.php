<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function combinationSum4($nums, $target) {
        $dp = array_fill(0, $target+1, 0);
        $dp[0]=1;
        for ($i=1;$i<=$target;$i++) {
            foreach ($nums as $n) {
                if($i-$n<0) continue;
                $dp[$i]=$dp[$i]+$dp[$i-$n];
            }
        }
        return $dp[$target];
    }

}
$nums=[1, 2, 3];
$target=4;
$i=new Solution();
print_r($i->combinationSum4($nums, $target));
