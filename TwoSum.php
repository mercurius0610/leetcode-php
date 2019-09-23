<?php
class TwoSum
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function brute_force($nums, $target) {
        $nums2 = $nums;
        foreach($nums as $i=>$m) {
            unset($nums2[$i]);
            foreach($nums2 as $j=>$n) {
                if($m+$n==$target) return [$i, $j];
            }
        }
        trigger_error("No two sum solution", E_USER_ERROR);
    }

    /**
     * php array 就是hashmap
     */
    function hash_map($nums, $target) {
        foreach($nums as $i=>$m) {
            $search = array_keys($nums, $target - $m);
            if(!empty($search) && end($search) != $i) {
                return [$i, end($search)];
            }
        }
        trigger_error("No two sum solution", E_USER_ERROR);
    }


}

$nums = [3,2,4];
$target = 6;
$instance = new TwoSum();
print_r($instance->hash_map($nums, $target));

