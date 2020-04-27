<?php
class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $rev = 0;
        if(PHP_INT_SIZE > 4) {
            $max_int = 2147483647;
            $min_int = -2147483648;
        }else {
            $max_int = PHP_INT_MAX;
            $min_int = PHP_INT_MIN;
        }
        while ($x!=0) {
            $pop = $x%10;
            $x=intval($x/10);
            if ($rev > $max_int/10 || ($rev == $max_int / 10 && $pop > 7)) return 0;
            if ($rev < $min_int/10 || ($rev == $min_int / 10 && $pop < -8)) return 0;
            $rev = $rev * 10 + $pop;
        }
        return $rev;
    }
}

$int = 236469;
$instance = new Solution();
print_r($instance->reverse($int));
