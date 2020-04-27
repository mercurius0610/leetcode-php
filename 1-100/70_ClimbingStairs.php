<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n) {

        $possible=[];
        $possible[1]=1;
        $possible[2]=2;
        for($i=3; $i<=$n; $i++) {
            $possible[$i] =  $possible[$i-1] + $possible[$i-2];
        }
        return $possible[$n];
    }
}
$i=new Solution();
print_r($i->climbStairs(4));



