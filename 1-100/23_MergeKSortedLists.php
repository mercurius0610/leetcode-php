<?php

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode[] $lists
     * @return ListNode
     */
    function mergeKLists($lists) {
        $dummy=new ListNode(0);
        $head=$dummy;
        while (count($lists)>0) {
            $min=PHP_INT_MAX;
            $minI=null;
            foreach ($lists as $i=>$l) {
                if($l==null) {unset($lists[$i]);continue;}
                if($l->val < $min) {
                    $min=$l->val;
                    $minI=$i;
                }
            }
            if($minI!==null) {
                $head->next=$lists[$minI];
                $head=$head->next;
                $lists[$minI]=$lists[$minI]->next;
                if($lists[$minI]==null) unset($lists[$minI]);
            }
        }
        return $dummy->next;
    }
}
class Solution2 {
    function mergeKLists($lists) {
        $q = new SplPriorityQueue();
        $dummy=new ListNode(0);
        $head=$dummy;
        foreach ($lists as $l) {
            if($l==null) continue;
            $q->insert($l, 0-$l->val);
        }
        $q->setExtractFlags(SplPriorityQueue::EXTR_BOTH);
        while ($q->valid()) {
            $head->next=$q->current()['data'];
            $head=$head->next;
            $q->next();
            if($head->next!=null) {
                $q->insert($head->next, 0-$head->next->val);
            }
        }
        return $dummy->next;
    }
}

//$l=[ [1,4,5], [1,3,4], [2,6], ];
$l=[[],[1]];
foreach ($l as $i=>$r) {
    $link=new ListNode(0);
    $head=$link;
    foreach ($r as $v) {
        $head->next=new ListNode($v);
        $head=$head->next;
    }
    $l[]=$link->next;
    unset($l[$i]);
}
$l=array_values($l);
$i=new Solution2();
print_r($i->mergeKLists($l));