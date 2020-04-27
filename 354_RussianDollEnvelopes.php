<?php
class Solution {

    /**
     * @param Integer[][] $envelopes
     * @return Integer
     */
    function maxEnvelopes($envelopes) {
        usort($envelopes, function($v1, $v2) {
            if($v1[0] == $v2[0]) return $v2[1] - $v1[1];
            else return $v1[0] - $v2[0];
        });
        $tails=array_fill(0, count($envelopes), 0);
        $max=0;
        foreach ($envelopes as $envelope) {
            $l=0;$r=$max;
            while($l<$r) {
                $m=intval(($r+$l)/2);
                if($tails[$m] < $envelope[1]) {
                    $l=$m+1;
                }
                else {
                    $r=$m;
                }
            }
            $tails[$l]=$envelope[1];
            if($l==$max) $max++;
        }
        return $max;

    }
}
//$envelopes = [[5,4],[6,4],[6,7],[2,3]];
//$envelopes = [[4,5],[4,6],[6,7],[2,3],[1,1]];
$envelopes = [[3,2],[4,5],[4,6],[6,7],[2,3],[1,1]];
$i=new Solution();
print_r($i->maxEnvelopes($envelopes));


