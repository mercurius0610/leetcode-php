<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function countNumbersWithUniqueDigits($n) {
        $dp[0]=0;
        $dp[1]=10;
        $base=9;
        for($i=2;$i<=$n;$i++) {
            $base=$base*(9-$i+2);
            $dp[$i]=$dp[$i-1]+$base;
        }
        return $dp[$n];
    }
}
$n=3;
$i=new Solution();
print_r($i->countNumbersWithUniqueDigits($n));


