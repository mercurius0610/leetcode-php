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
    function isValidBST($root) {
        $stack=[];
        $prev=null;
        while ($root!=null || !empty($stack)) {
            while ($root!=null) {
                $stack[]=$root;
                $root=$root->left;
            }
            $root=array_pop($stack);
            if($prev!=null && $prev->val <= $root->val) return false;
            $prev=$root;
            $root=$root->right;
        }
        return true;
    }
}

