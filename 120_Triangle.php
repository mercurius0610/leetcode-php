<?php
class Solution {

    /**
     * @param Integer[][] $triangle
     * @return Integer
     */
    function minimumTotal($triangle) {
        $len=count($triangle);
        $dp[0][0]=$triangle[0][0];
        for($i=1;$i<=$len;$i++) {
            for($j=0;$j<=$i;$j++) {
                if($j-1<0)  $dp[$i][$j]=$dp[$i-1][$j] + $triangle[$i][$j];
                elseif($j==$i) $dp[$i][$j]=$dp[$i-1][$j-1]+$triangle[$i][$j];
                else $dp[$i][$j]=min($dp[$i-1][$j], $dp[$i-1][$j-1])+$triangle[$i][$j];
            }
        }
        return min($dp[$len-1]);
    }
}
$triangle=[
    [2],
    [3,4],
    [6,5,7],
    [4,1,8,3]
];
$i=new Solution();
print_r($i->minimumTotal($triangle));


