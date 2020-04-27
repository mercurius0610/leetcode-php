<?php
class Solution {

    /**
     * @param Integer[] $prices
     * @return Integer
     */
    function maxProfit($prices) {
        if(count($prices)<2) return 0;
        $profit=array_fill(0, 3, array_fill(0, count($prices)-1, 0));
        for($i=1;$i<=2;$i++) {
            $tmpPrice=-$prices[0];
            for($j=1;$j<count($prices);$j++) {
                $profit[$i][$j] = max($profit[$i][$j-1], $prices[$j] + $tmpPrice);
                $tmpPrice=max($tmpPrice, $profit[$i-1][$j-1]-$prices[$j]);
            }
        }
        return $profit[2][count($prices)-1];
    }
}
$i=new Solution();
print_r($i->maxProfit([]));

