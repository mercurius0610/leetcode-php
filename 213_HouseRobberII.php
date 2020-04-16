<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function rob($nums) {
        if(empty($nums)) return 0;
        $dp_0[0]=0;
        $dp_1[0]=reset($nums);
        for($i=1;$i<count($nums);$i++) {
            $dp_0[$i]=max($dp_0[$i-1], $nums[$i]+$dp_0[$i-2]);
            if($i!=count($nums)-1) {
                $dp_1[$i]=max($dp_1[$i-1], $nums[$i]+$dp_1[$i-2]);
            }else {
                $dp_1[$i]=max($dp_1[$i-1], $dp_1[$i-2]);
            }
        }
        return max($dp_0[count($nums)-1], $dp_1[count($nums)-1]);
    }
}
$nums=[2,3,2];
$i=new Solution();
print_r($i->rob($nums));
