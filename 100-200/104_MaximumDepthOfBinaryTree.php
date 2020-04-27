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
     * @return Integer
     */
    function maxDepth($root) {
        if($root==null) return 0;
        $stack=[$root];
        $depth=[1];
        $max=0;
        while(!empty($stack)) {
            $curr_node=array_pop($stack);
            $curr_depth=array_pop($depth);
            $max=max($curr_depth, $max);
            if($curr_node->left!=null) {
                $stack[]=$curr_node->left;
                $depth[]=$curr_depth+1;
            }
            if($curr_node->right!=null) {
                $stack[]=$curr_node->right;
                $depth[]=$curr_depth+1;
            }
        }
        return $max;
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

$a=[3,9,20,null,null,15,7];
$i=new Solution();
print_r($i->maxDepth(build($a)));
