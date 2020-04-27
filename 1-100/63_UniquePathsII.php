<?php
class Solution {

    /**
     * @param Integer[][] $obstacleGrid
     * @return Integer
     */
    function uniquePathsWithObstacles($obstacleGrid) {
        $x=count(reset($obstacleGrid));
        $y=count($obstacleGrid);
        $value=1;
        foreach (reset($obstacleGrid) as $k=>$v) {
            if($v==1) $value=0;
            $dp[$k][0]=$value;
        }
        $value=1;
        foreach ($obstacleGrid as $k=>$r){
            $v=reset($r);
            if($v==1) $value=0;
            $dp[0][$k]=$value;
        }
        for($i=1;$i<$x;$i++) {
            for($j=1;$j<$y;$j++) {
                if($obstacleGrid[$j][$i]==1) $dp[$i][$j]=0;
                else $dp[$i][$j]=$dp[$i-1][$j]+$dp[$i][$j-1];
            }
        }
        return $dp[$x-1][$y-1];
    }
}
$obstacleGrid=[
    [0],
    [1],
];
$i=new Solution();
print_r($i->uniquePathsWithObstacles($obstacleGrid));
