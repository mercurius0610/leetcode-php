<?php
class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalSquare($matrix) {
        $maxLen=0;
        $dp=array_fill(0, count(reset($matrix)), array_fill(0, count($matrix), 0));
        for($i=0;$i<count($matrix);$i++) {
            for($j=0;$j<count(reset($matrix));$j++) {
                if($matrix[$i][$j] == '1') {
                    $dp[$i][$j] = min($dp[$i-1][$j-1], $dp[$i-1][$j], $dp[$i][$j-1])+1;
                    $maxLen=max($maxLen, $dp[$i][$j]);
                }
            }
        }
        return $maxLen*$maxLen;
    }
}
//$matrix=[
//['1','0','1','0','0'],
//['1','0','1','1','1'],
//['1','1','1','1','1'],
//['1','0','0','1','0'],
//];
$matrix=[
    ["0","1"]
];
$i=new Solution();
print_r($i->maximalSquare($matrix));


