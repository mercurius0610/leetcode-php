<?php
class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
        $lessThanLeft[0]=-1;
        $lessThanRight[count($heights)-1]=count($heights);
        for($i=1;$i<count($heights);$i++) {
            $p=$i-1;
            while ($p>=0&&$heights[$p]>=$heights[$i]) {
                $p=$lessThanLeft[$p];
            }
            $lessThanLeft[$i]=$p;
        }
        for ($i=count($heights)-2;$i>=0;$i--) {
            $p=$i+1;
            while ($p<count($heights)&&$heights[$p]>=$heights[$i]) {
                $p=$lessThanRight[$p];
            }
            $lessThanRight[$i]=$p;
        }
        $max=0;
        foreach ($heights as $i=>$n) {
            $max=max($max, $heights[$i]*($lessThanRight[$i]-$lessThanLeft[$i]-1));
        }
        return $max;
    }
}
$heights=[2,1,5,6,2,3];
$i= new Solution();
print_r($i->largestRectangleArea($heights));


