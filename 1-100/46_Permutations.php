<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function permute($nums) {
        $res=[];
        sort($nums);
        $res[]=$nums;
        do{
           $nums = $this->next_permutations($nums);
           if(!empty($nums)) {
               $res[] = $nums;
           }
        } while(!empty($nums));
        return $res;
    }

    function next_permutations($nums) {
        for($i=count($nums)-2; $i>=0; $i--) {
            if($nums[$i]<$nums[$i+1]) {
                $justLarger=$nums[$i+1];
                $justLargerK=$i+1;
                for($j=$i+1;$j<=count($nums)-1;$j++) {
                    if($nums[$j] > $nums[$i] && $justLarger > $nums[$j]) {
                        $justLarger=$nums[$j];
                        $justLargerK=$j;
                    }
                }
                list($nums[$justLargerK], $nums[$i]) = [$nums[$i], $nums[$justLargerK]];
                $endList = array_slice($nums, $i+1);
                sort($endList);
                $nums = array_merge(
                    array_slice($nums, 0, $i+1),
                    $endList
                );
                return $nums;
            }
        }
        return [];
    }
}
$a=[1,2,3];
$i=new Solution();
$res=$i->permute($a);
print_r($res);

