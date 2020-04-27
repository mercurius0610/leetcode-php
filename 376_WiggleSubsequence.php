<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function wiggleMaxLength($nums) {
        // need positive   // need negative
        if(count($nums)==0) return 0;
        $dp_0=$dp_1=array_fill(0, count($nums), PHP_INT_MIN);
        $dp_1[0]=$dp_0[0]=1;
        $max=0;
        for($i=1;$i<count($nums);$i++) {
            for($j=0;$j<$i;$j++) {
                if($nums[$i] > $nums[$j]) {
                    $dp_0[$i]=max($dp_1[$j]+1, $dp_0[$i]);
                }
                else if($nums[$i] < $nums[$j]) {
                    $dp_1[$i]=max($dp_0[$j]+1, $dp_1[$i]);
                }
                else {
                    $dp_0[$i]=$dp_0[$j];
                    $dp_1[$i]=$dp_1[$j];
                }
            }
            $max=max($dp_0[$i], $dp_1[$i]);
        }
        return $max;
    }

}
$nums=[1,17,5,10,13,15,10,5,16,8];
$i=new Solution();
print_r($i->wiggleMaxLength($nums));




