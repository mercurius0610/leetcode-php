<?php
class Solution {

    /**
     * @param String[] $words
     * @param Integer $k
     * @return String[]
     */
    function topKFrequent($words, $k) {
        $map=[];
        $q=new SplPriorityQueue();
        $q->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        foreach ($words as $v) {
            if (!isset($map[$v])) {
                $map[$v] = 1;
            } else {
                $map[$v]++;
            }
        }
        foreach ($map as $v=>$count) {
            if($k>0) {
                $q->insert($v, [0-$count, $v]);
                $k--;
            }
            else {
                if($q->compare($q->top()['priority'],[0-$count, $v]) > 0 ) {
                    $q->extract();
                    $q->insert($v, [0-$count, $v]);
                }
            }
        }
        $res=[];
        while ($q->valid()) {
            array_unshift($res,$q->current()['data']);
            $q->next();
        }
        return $res;
    }
}
$a=["the", "day", "is", "sunny", "the", "the", "the", "sunny", "is", "is"];
$k=4;
//$a=["i", "love", "leetcode", "i", "love", "coding"];
//$k=2;
//$a=["a","aa","aaa"];
//$k=2;
$i=new Solution();
print_r($i->topKFrequent($a, $k));

