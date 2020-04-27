<?php
class Solution {

    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows) {
        if($numRows==0) return [];
        $res[0][0]=1;
        for($i=1;$i<$numRows;$i++) {
            for($j=0;$j<=$i;$j++) {
                $res[$i][$j]=$res[$i-1][$j-1]+$res[$i-1][$j];
            }
        }
        return $res;
    }
}

$n=5;
$i=new Solution();
print_r($i->generate($n));
