<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function largestDivisibleSubset($nums) {
        if(count($nums)==0) return [];
        sort($nums);
        $dp=[];
        $maxI=0;
        $maxSize=-1;
        $finalI=0;
        $finalSize=-1;
        for($i=0;$i<count($nums);$i++) {
            $dp[$i]=[];
            for($j=$i-1;$j>=0;$j--) {
                if($nums[$i]%$nums[$j] == 0) {
                    if(count($dp[$i]) > $maxSize) {
                        $maxSize=count($dp[$j]);
                        $maxI=$j;
                    }
                }
            }
            if($maxSize!=-1) $dp[$i] = $dp[$maxI];
            $dp[$i][]=$nums[$i];
            if(count($dp[$i]) > $finalSize) {
                $finalSize = count($dp[$i]);
                $finalI = $i;
            }
            $maxI=0;
            $maxSize=-1;
        }
        print_r($dp);
        return $dp[$finalI];
    }
}
$nums=[2,8,240];
$i=new Solution();
print_r($i->largestDivisibleSubset($nums));


