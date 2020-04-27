<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {

        $profit=0;
        for($i=0; $i<count($prices)-1; $i++) {
            $profit+=max(0, $prices[$i+1] - $prices[$i]);
        }
        return $profit;
    }
}
$i=new Solution();
print_r($i->maxProfit([7,6,4,3,1]));

