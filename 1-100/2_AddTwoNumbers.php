<?php
class AddTwoNumbers
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function brute_focus($l1, $l2) {
        $carry = 0;
        $result = new ListNode(0);
        $curr = $result;
        do{
            $curr->next = new ListNode(($l1->val+$l2->val+$carry)%10);
            $curr = $curr->next;
            $carry = intval(($l1->val+$l2->val+$carry)/10);
            $l1 = ($l1 != null) ? $l1->next : $l1;
            $l2 = ($l2 != null) ? $l2->next : $l2;
        }
        while($l1 != null || $l2 != null);
        if($carry > 0) $curr->next = new ListNode($carry);
        return $result->next;
    }

}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

$instance = new AddTwoNumbers();
$l1 = new ListNode(0);
$c1 = $l1;
foreach([1] as $item) {
    $c1->next = new ListNode($item);
    $c1 = $c1->next;
}
$l2 = new ListNode(0);
$c2 = $l2;
foreach([9,9] as $item) {
    $c2->next = new ListNode($item);
    $c2 = $c2->next;
}
print_r($instance->brute($l1->next, $l2->next));

