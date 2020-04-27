<?php
class Solution {

    /**
     * @param String $s
     * @param Integer $numRows
     * @return String
     */
    function convert($s, $numRows) {
        if($numRows<2) return $s;
        if(!$s) return $s;
        $zig=[];
        foreach (str_split($s) as $i=>$a) {
            $m = ($i+1)%(2*$numRows-2);
            if($m==0) $m = 2*$numRows-2;
            $n = $m%$numRows;
            if($n==0) {
                $zig[$numRows] = isset($zig[$numRows]) ? $zig[$numRows].$a : $a;
            }
            else if($m<=$numRows) {
                $zig[$n] = isset($zig[$n]) ? $zig[$n].$a : $a;
            }else {
                $zig[$numRows-$n] = isset($zig[$numRows-$n]) ? $zig[$numRows-$n].$a : $a;
            }
        }
        return implode("", $zig);
    }
}
$string = "PAYPALISHIRING";
$numRows = 3;
$instance = new Solution();
$result = $instance->convert($string, $numRows);
print_r($result);
