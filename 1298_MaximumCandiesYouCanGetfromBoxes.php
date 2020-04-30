<?php
class Solution {

    /**
     * @param Integer[] $status
     * @param Integer[] $candies
     * @param Integer[][] $keys
     * @param Integer[][] $containedBoxes
     * @param Integer[] $initialBoxes
     * @return Integer
     */
    function maxCandies($status, $candies, $keys, $containedBoxes, $initialBoxes) {
        $candy=0;
        $open_box_queue=$initialBoxes;
        $close_box_map=[];
        $had_key=[];
        while (!empty($open_box_queue)) {
            $box_i=array_shift($open_box_queue);
            $candy+=$candies[$box_i];
            foreach ($containedBoxes[$box_i] as $box) {
                if($status[$box]) $open_box_queue[]=$box;
                else $close_box_map[$box]=1;
            }
            foreach ($keys[$box_i] as $key) {
                $had_key[]=$key;
            }
            foreach ($had_key as $key) {
                if(isset($close_box_map[$key])) {
                    unset($close_box_map[$key]);
                    $open_box_queue[]=$key;
                }
            }
        }
        return $candy;

    }
}