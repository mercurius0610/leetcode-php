<?php
class Solution {

    /**
     * @param Integer $num
     * @return Integer[]
     */
    function countBits($num) {
        $dp=[0];
        for($i=1;$i<=$num;$i++) {
            $n=$i;
            $v=1;
            $n-=pow(2, max($dp));
            $v+=$dp[$n];
            $dp = array_merge(
                $dp,
                [$v]
            );
        }
        return $dp;
    }
}
class Solution2 {
    function countBits($num)
    {
        $res=[0];
        for($i=1;$i<=$num;$i++) {
            $res[$i]=$res[$i/2] + $i%2;
        }
        return $res;
    }
}
$n=85723;
$i=new Solution2();
$res=$i->countBits($n);
print_r($res);

