<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function longestPalindromeSubseq($s) {
        for($j=1;$j<strlen($s);$j++) {
            $dp[$j][$j]=1;
            for($i=$j;$i>=0;$i--) {
                if($s[$i] == $s[$j]) $dp[$i][$j]=$dp[$i+1][$j-1]+2;
                else $dp[$i][$j]=max($dp[$i+1][$j], $dp[$i][$j-1]);
            }
        }
        return $dp[0][strlen($s)-1];
    }

}
$s="bbbab";
$i=new Solution();
print_r($i->longestPalindromeSubseq($s));
