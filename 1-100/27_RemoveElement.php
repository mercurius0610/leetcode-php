<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        $n=0;
        foreach ($nums as $k=>$i) {
            if($i===$val) unset($nums[$k]);
            else $n++;
        }
        return $n;
    }
}
$a=[0,1,2,2,3,0,4,2]; $v=2;
$i=new Solution();
print_r($i->removeElement($a, $v));
print_r($a);

