<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        if(strlen($s) == 0) return true;
        $stack = [];
        foreach (str_split($s) as $i) {
            if ($i == '(') {
                $stack[] = ')';
            } elseif ($i == '[') {
                $stack[] = ']';
            } elseif ($i == '{') {
                $stack[] = '}';
            } elseif(empty($stack) || array_pop($stack) != $i) {
                return false;
            }
        }
        return empty($stack);
    }
}
$s="";
$i=new Solution();
var_dump($i->isValid($s));

