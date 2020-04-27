<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {

        $prefix = "";
        $first_str = reset($strs);
        unset($strs[0]);
        for($i=1;$i<=strlen($first_str);$i++) {
            $m=substr($first_str, 0, $i);
            foreach ($strs as $str) {
                if(substr($str, 0, $i) != $m) break 2;
            }
            $prefix = $m;
        }
        return $prefix;
    }
}

class Solution2 {
    /*
     * 二分法
     */
    function longestCommonPrefix($strs) {
        if(count($strs) == 0) return '';
        $minLength = PHP_INT_MAX;
        foreach ($strs as $str) {
            $minLength = min($minLength, strlen($str));
        }
        $l=1;
        $r=$minLength;
        while($l<=$r) {
            $m=ceil(($l+$r)/2);
            if(self::isLCP($strs, $m)) {
                $l=$m+1;
            }
            else {
                $r=$m-1;
            }
        }
        return substr($strs[0],0, floor(($l+$r)/2));

    }

    static function isLCP($strs, $len) {
        $first_str = reset($strs);
        unset($strs[0]);
        $s=substr($first_str, 0, $len);
        foreach ($strs as $str) {
            if($s != substr($str, 0 , $len)) return false;
        }
        return true;
    }
}

$strs = ["a"];
$i = new Solution2();
print_r($i->longestCommonPrefix($strs));
