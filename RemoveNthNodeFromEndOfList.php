<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $dummy = new ListNode(0);
        $dummy->next = $head;
        $first = $head;
        $length = 0;
        while ($first!=null) {
            $length++;
            $first=$first->next;
        }
        $length-=$n;
        $first=$dummy;
        while ($length>0){
            $length--;
            $first=$first->next;
        }
        $first->next=$first->next->next;
        return $dummy->next;
    }
}

$arr = [1,2,3,4,5];
$l1= new ListNode(0);
$head=$l1;
foreach ($arr as $i) {
    $head->next = new ListNode($i);
    $head = $head->next;
}
$i=new Solution();
print_r($i->removeNthFromEnd($l1->next, 2));

