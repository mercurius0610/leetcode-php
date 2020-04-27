<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}
class Solution {
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $dump=new ListNode(0);
        $head=$dump;
        while ($l1!=null) {
            if($l2==null) {
                $head->next=$l1;
                break;
            }
            if($l1->val > $l2->val) {
                $head->next=$l2;
                $l2=$l2->next;
            }
            else {
                $head->next=$l1;
                $l1=$l1->next;
            }
            $head=$head->next;
        }
        if($l2!=null) $head->next=$l2;
        return $dump->next;
    }
}
$a1=[1,2,4];
$a2=[1,3,4];
$l1 = new ListNode(0);
$head=$l1;
foreach ($a1 as $i){
    $head->next=new ListNode($i);
    $head=$head->next;
}
$l2 = new ListNode(0);
$head=$l2;
foreach ($a2 as $i) {
    $head->next=new ListNode($i);
    $head=$head->next;
}
$i=new Solution();
print_r($i->mergeTwoLists($l1->next, $l2->next));

