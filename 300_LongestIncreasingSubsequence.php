<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function lengthOfLIS($nums) {
        if(empty($nums)) return 0;
        $dp[0]=[reset($nums)];
        $max=1;
        for($i=1;$i<count($nums);$i++) {
            $maxCurrI=-1;
            $maxCurrSize=0;
            for($j=0;$j<$i;$j++) {
                if(count($dp[$j]) > $maxCurrSize && $nums[$i] > end($dp[$j])) {
                    $maxCurrI=$j;
                    $maxCurrSize=count($dp[$j]);
                }
            }
            if($maxCurrI>=0){
                $dp[$i]=$dp[$maxCurrI];
                array_push($dp[$i], $nums[$i]);
            }
            else {
                $dp[$i]=[$nums[$i]];
            }
            $max=max($max, count($dp[$i]));
        }
        return $max;
    }
}

class Solution2 {
    function lengthOfLIS($nums)
    {
        $tails=array_fill(0, count($nums), 0);
        $size=0;
        foreach($nums as $n) {
            $i=0;$j=$size;
            while($i!=$j) {
                $m=intval(($i+$j)/2);
                if($tails[$m]<$n) {
                    $i=$m+1;
                }
                else {
                    $j=$m;
                }
            }
            $tails[$i]=$n;
            if($i==$size) $size++;
        }
        return $size;
    }
}

$nums=[10,9,2,5,3,7,101,18];
//$nums=[-2,-1];
$i=new Solution2();
print_r($i->lengthOfLIS($nums));


