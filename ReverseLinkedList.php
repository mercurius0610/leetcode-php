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
    function reverseList($head) {
        $prev=null;
        $current=$head;
        while ($current!=null) {
            $next=$current->next;
            $current->next=$prev;
            $prev=$current;
            $current=$next;
        }
        $head=$prev;
        return $head;
    }
}
class Solution2 {
    function reverseList($head) {
        if($head==null||$head->next==null) return $head;
        $p=$this->reverseList($head->next);
        $head->next->next=$head;
        $head->next=null;
        return $p;
    }
}
$a=[1,2,3,4,5];
$l=new ListNode(0);
$head=$l;
foreach ($a as $i) {
    $head->next=new ListNode($i);
    $head=$head->next;
}
$i=new Solution();
print_r($i->reverseList($l->next));
