<?php
class Solution {

    /**
     * @param Integer[] $A
     * @return Integer
     */
    function numberOfArithmeticSlices($A) {
        if(count($A)<3) return 0;
        $dp=array_fill(0, count($A)+1, 0);
        $l=0;
        $prev=0;
        for($i=2;$i<count($A);$i++) {
            if($A[$i]-$A[$i-1] == $A[$i-1]-$A[$i-2]) {
                $l++;
                $prev+=$l;
                $dp[$i]=$dp[$i-1]+$l;
            }
            else{
                $l=0;
                $prev=0;
                $dp[$i]=$dp[$i-1]+$prev;
            }
        }
        return $dp[count($A)-1];
    }

}
//$a=[1, 2, 3, 4];
$a=[1,2,3,8,9,10];
$i=new Solution();
print_r($i->numberOfArithmeticSlices($a));
