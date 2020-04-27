<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums) {
        $map=[];
        $res=0;
        foreach ($nums as $n) {
            if(isset($map[$n])) continue;
            $left=isset($map[$n-1]) ? $map[$n-1] : 0;
            $right=isset($map[$n+1]) ? $map[$n+1] : 0;
            $sum=$left+$right+1;
            $map[$n]=$sum;
            $res=max($res, $sum);
            $map[$n-$left]=$sum;
            $map[$n+$right]=$sum;
        }

        return $res;
    }
}
//$a=[100, 4, 200, 1, 3, 2];
$a=[1,2,0,1];
$i=new Solution();
print_r($i->longestConsecutive($a));
