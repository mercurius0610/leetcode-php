<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[][]
     */
    function fourSum($nums, $target) {
        sort($res);
        return $this->kSum($nums, $target, 4, 0);
    }

    function kSum($nums, $target, $k, $i) {

    }

    function twoSum($nums) {
        for($i=0; $i<count($nums)-2; $i++) {
            if($i>0 && $nums[$i] == $nums[$i-1]) continue;
            $l=$i+1; $r=count($nums)-1;
            $s=0-$nums[$i];
            while ($l<$r) {
                if($nums[$r] + $nums[$l] == $s) {
                    $res[] = [$nums[$i], $nums[$l], $nums[$r]];
                    while ($l<$r && $nums[$l]==$nums[$l+1]) $l++;
                    while ($l<$r && $nums[$r]==$nums[$r+1]) $r--;
                    $l++;$r--;
                } elseif ($nums[$l] + $nums[$r] < $s) {
                    $l++;
                } else {
                    $r--;
                }
            }
        }
    }
}
