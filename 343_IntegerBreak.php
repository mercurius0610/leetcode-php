<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function integerBreak($n) {
        $dp=new SplFixedArray($n+1);
        $dp[0]=0;$dp[1]=0;$dp[2]=1;
        for($i=3;$i<=$n;$i++) {
            if($dp[$i-3]<3) {
                $dp[$i]=max($i-1, ($i-2)*2, ($i-3)*3);
            }
            else {
                $dp[$i]=max(
                    $dp[$i-2]*2,
                    $dp[$i-3]*3,
                );
            }
        }
        return $dp[$n];
    }
}
$n=10;
$i=new Solution();
print_r($i->integerBreak($n));


