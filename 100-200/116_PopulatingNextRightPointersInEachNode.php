<?php
/**
 * Definition for a Node.
 */
class Node {
    function __construct($val = 0) {
        $this->val = $val;
        $this->left = null;
        $this->right = null;
        $this->next = null;
    }
}
class Solution {
    /**
     * @param Node $root
     * @return Node
     */
    public function connect($root) {
        if($root == null) return null;
        $queue_1=[$root];
        $queue_2=[];
        while(!empty($queue_1)) {
            $curr_node=array_shift($queue_1);
            $curr_node->next=reset($queue_1);
            if($curr_node->left!=null){
                $queue_2[]=$curr_node->left;
            }
            if($curr_node->right!=null){
                $queue_2[]=$curr_node->right;
            }
            if(empty($queue_1) && !empty($queue_2)) {
                $queue_1=$queue_2;
                $queue_2=[];
            }
        }
        return $root;
    }
}

class Solution2 {
    public function connect($root) {
        if($root==null) return null;
        $level_start=$root;
        while ($level_start!=null){
            $curr_node=$level_start;
            while ($curr_node!=null) {
                if($curr_node->left!=null) $curr_node->left->next=$curr_node->right;
                if($curr_node->right!=null && $curr_node->next!=null) $curr_node->right->next=$curr_node->next->left;
                $curr_node=$curr_node->next;
            }
            $level_start=$level_start->left;
        }
        return $root;
    }
}
$a=[1,2,3,4,5,6,7];
$i=new Solution();
print_r($i->connect(build($a)));


