<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function swapPairs($head) {
        if($head==null||$head->next==null) {
            return $head;
        }
        $l=$head->next;
        $head->next=$this->swapPairs($head->next->next);
        $l->next=$head;
        return $l;
    }
}

$a=[1,2,3,4,5,6,7,8,9,10];
$l=new ListNode(0);
$head=$l;
foreach ($a as $n) {
    $head->next = new ListNode($n);
    $head = $head->next;
}
$i=new Solution();
print_r($i->swapPairs($l->next));
