<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function findKthLargest($nums, $k) {
        $heap=new SplMaxHeap();
        $i=count($nums)-$k+1;
        foreach ($nums as $k=>$n) {
            if($k<$i) {
                $heap->insert($n);
            }
            else if($heap->top()>$n) {
                $heap->extract();
                $heap->insert($n);
            }
        }
        return $heap->extract();
    }
}
$nums=[3,2,1,5,6,4];
$k=2;
$i=new Solution();
print_r($i->findKthLargest($nums, $k));

