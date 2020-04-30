<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        $dummy=$head;
        $n=1;
        while ($head!=null) {
            if($head->val%$k==0) {
                $this->reserve($dummy, $head->val, $n);
            }
            $n++;
            $head=$head->next;
        }
        return $dummy;
    }

    function reserve($l, $v1, $v2) {
        $prev=null;
        $current=$l;
        $dummy=new ListNode(0);
        $dummy->next=$l;
        $start_reserve=false;
        while ($current!=null) {
            if($dummy->next->val==$v1 || $dummy->next->val==$v2) {
                $start_reserve=!$start_reserve;
            }
            if($start_reserve) {
                $next=$current->next;
                $prev=$current;
                $current=$next;
            }
        }
        return $prev;
    }
}

$a=[2,1,3,4];
$l=new ListNode(0);
$head=$l;
foreach ($a as $n) {
    $head->next = new ListNode($n);
    $head = $head->next;
}
$a=$l->next;
$l->next->next=$l;
$l->next=null;
print_r($a);
print_r($l);
//$i=new Solution();
//$k=2;
//print_r($i->reverseKGroup($l->next, $k));

