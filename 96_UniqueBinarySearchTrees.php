<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function numTrees($n) {

        $dp=array_fill(0, $n+1, 0);
        $dp[0]=$dp[1]=1;
        for($i=2;$i<=$n;$i++) {
            for($j=1;$j<=$i;$j++) {
                $dp[$i]+=$dp[$j-1]*$dp[$i-$j];
            }
        }
        return $dp[$n];
    }
}
$n=5;
$i=new Solution();
print_r($i->numTrees($n));

