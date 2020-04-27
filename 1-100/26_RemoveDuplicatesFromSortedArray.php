<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        $prev=null;
        $n=0;
        foreach ($nums as $k=>$i) {
            if($i===$prev) {
                unset($nums[$k]);
            }
            else {
                $prev=$i;
                $n++;
            }
        }
        return $n;
    }
}
$a=[0,0,1,1,1,2,2,3,3,4];
$i=new Solution();
print_r($i->removeDuplicates($a));
print_r($a);

