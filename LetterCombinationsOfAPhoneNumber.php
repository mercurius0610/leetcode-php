<?php
class Solution {

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits) {
        $len = strlen($digits);
        if($len == 0) return [];
        $res=  [];
        $map = ["", "", "abc", "def", "ghi", "jkl", "mno", "pqrs", "tuv", "wxyz"];
        $res[]="";
        while (strlen(reset($res)) != $len) {
            $remove = array_shift($res);
            $str = $map[substr($digits, strlen($remove), 1)];
            foreach (str_split($str) as $s) {
                $res[] = $remove.$s;
            }
        }
        return $res;
    }
}
$digits = "23";
$i=new Solution();
print_r($i->letterCombinations($digits));

