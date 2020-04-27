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
     * @return Integer[][]
     */
    function levelOrder($root) {
        $queue_1=[$root];
        $queue_2=[];
        $res=[];
        $n=0;
        while (!empty($queue_1)) {
            $curr_node=array_pop($queue_1);
            if($curr_node->val!==null) {
                $res[$n][]=$curr_node->val;
            }
            if($curr_node->left!=null) {
                $queue_2[]=$curr_node->left;
            }
            if($curr_node->right!=null) {
                $queue_2[]=$curr_node->right;
            }
            if(empty($queue_1) && !empty($queue_2)) {
                $queue_1=array_reverse($queue_2);
                $queue_2=[];
                $n++;
            }
        }
        return $res;
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
print_r($i->levelOrder(build($a)));
