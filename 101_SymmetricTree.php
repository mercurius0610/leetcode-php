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
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root) {
        if($root->left==null && $root->right==null) return true;
        elseif($root->left == null || $root->right == null) return false;
        $stack=[];
        $stack[]=$root->left;$stack[]=$root->right;
        while(!empty($stack)) {
            if(count($stack)%2!=0) return false;
            $curr_right= array_pop($stack);
            $curr_left=array_pop($stack);
            if($curr_left->val != $curr_right->val) return false;
            if($curr_left->left !=null) {
                if($curr_right->right == null) return false;
                $stack[]=$curr_right->right;
                $stack[]=$curr_left->left;
            }
            elseif($curr_right->right !=null) return false;

            if($curr_left->right!=null) {
                if($curr_right->left==null) return false;
                $stack[]=$curr_right->left;
                $stack[]=$curr_left->right;
            }
            elseif($curr_right->left!=null) return false;
        }
        return true;
    }
}
function build($a) {
    if(empty($a)) return null;
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
$a=[1,2,2,3,4,4,3];
$i=new Solution();
var_dump($i->isSymmetric(build($a)));


