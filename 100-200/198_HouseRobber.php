<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        $dp=[];
        if(count($nums)==0) return 0;
        for($i=0;$i<count($nums);$i++) {
            $dp[$i]=max($dp[$i-1], $nums[$i]+$dp[$i-2]);
        }

        return $dp[count($nums)];
    }
}
$nums=[6,3,10,8,2,10,3,5,10,5,3];
$i=new Solution();
$res=$i->rob($nums);
print_r($res);
