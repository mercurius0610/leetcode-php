<?php
class Solution {

    /**
     * @param Integer $m
     * @param Integer $n
     * @return Integer
     */
    function uniquePaths($m, $n) {
        for($i=0;$i<$m;$i++) $dp[$i][0]=1;
        for($j=0;$j<$n;$j++) $dp[0][$j]=1;
        for($i=1;$i<$m;$i++) {
            for($j=1;$j<$n;$j++) {
                $dp[$i][$j] = $dp[$i-1][$j] + $dp[$i][$j-1];
            }
        }
        print_r($dp);
        return $dp[$m-1][$n-1];
    }
}
$i=new Solution();
$m=2;$n=3;
print_r($i->uniquePaths($m, $n));
