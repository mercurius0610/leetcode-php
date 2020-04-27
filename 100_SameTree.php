<?php
/**
 * Definition for a binary tree node.
 */
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($value) { $this->val = $value; }
}
class Solution {

    /**
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q) {
        $stack_p=$stack_q=[];
        if($p!=null)$stack_p[]=$p;
        if($q!=null)$stack_q[]=$q;
        while (!empty($stack_q) && !empty($stack_p)) {
            $curr_p = array_pop($stack_p);
            $curr_q = array_pop($stack_q);
            if($curr_p->val != $curr_q->val) return false;
            if($curr_p->right!=null) $stack_p[] = $curr_p->right;
            if($curr_q->right!=null) $stack_q[] = $curr_q->right;
            if(count($stack_p) != count($stack_q)) return false;
            if($curr_p->left!=null) $stack_p[] = $curr_p->left;
            if($curr_q->left!=null) $stack_q[] = $curr_q->left;
            if(count($stack_p) != count($stack_q)) return false;
        }
        return count($stack_q) == count($stack_p);
    }
}

function build($a) {
    $root = new TreeNode(reset($a));
    $first_col=$root;
    $queue_1=[$root];
    $queue_2=[];
    foreach ($a as $k=>$r) {
        if($k==0) continue;
        $node = new TreeNode($r);
        $current=end($queue_1);
        if($current==null) {
            $current=$first_col->left;
            $first_col=$node;
            $queue_1=array_reverse($queue_2);
            $queue_2=[];
        }
        if($current->left==null) {
            $current->left = $node;
            $queue_2[]=$node;
        }
        else if ($current->right==null) {
            $current->right = $node;
            array_pop($queue_1);
            $queue_2[]=$node;
        }

    }
    return $root;
}
$a1=[1,2,3];  $a2=[1,2,3];
//$a3=[5,1,4,null,null,3,6];
$i = new Solution();
var_dump($i->isSameTree(build($a1), build($a2)));
