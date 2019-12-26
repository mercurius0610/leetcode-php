<?php
class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {

        sort($nums);
        $close = $nums[0] + $nums[1] + $nums[2];
        for($i=0; $i<count($nums)-2; $i++) {
            if($i>0 && $nums[$i] == $nums[$i-1]) continue;
            $l=$i+1; $r=count($nums)-1;
            while ($l<$r) {
                $c = $nums[$i] + $nums[$l] + $nums[$r];
                if($c == $target) return $c;
                elseif ($c<$target) $l++;
                else $r--;
                if(abs($c-$target) < abs($close-$target)) $close=$c;
            }
        }
        return $close;
    }
}


$nums = [-1, 2, 1, -4];
$target = 1;
$i = new Solution();
print_r($i->threeSumClosest($nums, $target));

