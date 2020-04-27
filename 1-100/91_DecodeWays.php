<?php
class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function numDecodings($s) {
        if($s[0]=="0" || !$s) return 0;
        $dp=array_fill(0, strlen($s), 0);
        $dp[0]=$s[0] == 0 ? 0 : 1;
        for($i=1;$i<strlen($s);$i++) {
            $first = intval(substr($s, $i, 1));
            $second = intval(substr($s, $i-1, 2));
            if($first >= 1 && $first <= 9) {
                $dp[$i] += $dp[$i-1];
            }
            if($second >= 10 && $second <= 26) {
                if($i>=2) {
                    $dp[$i] += $dp[$i-2];
                }else {
                    $dp[$i] += 1;
                }
            }
        }
        return $dp[strlen($s)-1];
    }
}
$s="100";
$i=new Solution();
print_r($i->numDecodings($s));

for($i=1;$i<strlen($s);$i++) {


}
