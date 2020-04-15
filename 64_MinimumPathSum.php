<?php
class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minPathSum($grid) {
        $dp[0][0]=$grid[0][0];
        foreach ($grid as $j=>$r) {
            foreach ($r as $i=>$v) {
                if($j==0) $dp[$i][$j] = $dp[$i][$j] = $dp[$i-1][$j]+$v;
                elseif($i==0) $dp[$i][$j] = $dp[$i][$j] = $dp[$i][$j-1]+$v;
                else $dp[$i][$j]=min( $dp[$i][$j-1], $dp[$i-1][$j] )+$v;
            }
        }
        return $dp[count($grid[0])-1][count($grid)-1];
    }
}
$grid=[
    [1,3,1],
    [1,5,1],
    [4,2,1]
];
$i=new Solution();
print_r($i->minPathSum($grid));

