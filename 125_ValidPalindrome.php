<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isPalindrome($s) {
        $l=0;$r=strlen($s)-1;
        while ($l<$r) {
            $from=strtolower($s[$l]);
            $to=strtolower($s[$r]);
            if(!ctype_alpha($from) && !ctype_digit($from)) { $l++; continue;}
            if(!ctype_alpha($to) && !ctype_digit($to)) {$r--; continue;}
            if($from!=$to) return false;
            else {
                $l++;$r--;
            }
        }
        return true;
    }
}
$s="A man, a plan, a canal: Panama";
$i=new Solution();
var_dump($i->isPalindrome($s));


