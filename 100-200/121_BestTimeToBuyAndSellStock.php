<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        $maxCurr=0;
        $maxProfit=0;
        for($i=0;$i<count($prices)-1;$i++) {
            $maxCurr = max(0, $prices[$i+1] - $prices[$i] + $maxCurr);
            $maxProfit = max($maxProfit, $maxCurr);
        }
        return $maxProfit;
    }
}
$i=new Solution();
print_r($i->maxProfit([7,1,5,3,6,4]));
