<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        for($i=count($nums)-2; $i>=0;$i--) {
            if($nums[$i+1]>$nums[$i]) {
                $justLarger=$nums[$i+1];
                $mink=$i+1;
                for($j=$i+1; $j<=count($nums)-1;$j++)  {
                    if($nums[$i]<$nums[$j] && $justLarger>$nums[$j]) {
                        $justLarger=$nums[$j];
                        $mink=$j;
                    }
                }
                list($nums[$mink], $nums[$i]) = [$nums[$i], $nums[$mink]];
                $sort = array_slice($nums, $i+1);
                sort($sort);
                $nums=
                    array_merge(
                        array_slice($nums, 0, $i+1),
                        $sort
                    );
                return null;
            }
        }
        if(!isset($mink)) $nums = array_reverse($nums);
        return null;
    }
}
$a=[3,2,1];
$i=new Solution();
$i->nextPermutation($a);
print_r($a);
