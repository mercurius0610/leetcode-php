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
     * @param Integer[] $nums
     * @return TreeNode
     */
    function sortedArrayToBST($nums) {
        return $this->helper($nums, 0, count($nums)-1);
    }

    function helper($nums, $s, $e) {
        if($s>$e) return null;
        $mid=intval(($s+$e)/2);
        $node=new TreeNode($nums[$mid]);
        $node->left=$this->helper($nums, $s, $mid-1);
        $node->right=$this->helper($nums, $mid+1, $e);
        return $node;
    }
}
$a=[-10,-3,0,5,9];
$i=new Solution();
print_r($i->sortedArrayToBST($a));


