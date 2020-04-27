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
    private $max;
    function maxPathSum($root) {
        $this->max=PHP_INT_MIN;
        $this->helper($root);
        return $this->max;
    }

    function helper($node) {
        if($node===null) return 0;
        $left_max=max(0, $this->helper($node->left));
        $right_max=max(0, $this->helper($node->right));
        $this->max=max($this->max, $node->val+ $left_max + $right_max);
        return max($left_max, $right_max)+$node->val;
    }

}
function build($a) {
    $root=new TreeNode(array_shift($a));
    $q1=[$root];
    $q2=[];
    foreach ($a as $v) {
        $curr=reset($q1);
        if($curr->left==null) {
            if($v!=null) {
                $curr->left=new TreeNode($v);
                $q2[]=$curr->left;
            }
        }
        else if ($curr->right==null) {
            if($v!=null) {
                $curr->right=new TreeNode($v);
                $q2[]=$curr->right;
            }
            array_shift($q1);
        }
        if(empty($q1)) {
            $q1=$q2;
            $q2=[];
        }
    }
    return $root;
}
$a=[5,4,8,11,null,13,4,7,2,null,null,null,1];
$tree=build($a);
$i=new Solution();
print_r($i->maxPathSum($tree));


