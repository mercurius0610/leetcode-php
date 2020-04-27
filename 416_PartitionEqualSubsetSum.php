<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Boolean
     */
    function canPartition($nums) {
        $sum=array_sum($nums);
        if($sum%2>0) return false;
        $m=count($nums);
        $n=$sum/2;
        $dp=[];
        for($i=0;$i<$m;$i++) $dp[$i][0]=true;
        for($j=0;$j<=$n;$j++) $dp[0][$j]=false;
        $dp[0][0]=true;
        for($i=1;$i<$m;$i++) {
            for($j=1;$j<=$n;$j++) {
                $dp[$i][$j]=$dp[$i-1][$j];
                if($j-$nums[$i]>=0) {
                    $dp[$i][$j] = $dp[$i][$j] || $dp[$i-1][$j-$nums[$i]];
                }
            }
        }
        return $dp[$m-1][$n];
    }
}
//$nums=[1, 5, 11, 5];
$nums=[1, 1];
$i=new Solution();
var_dump($i->canPartition($nums));



