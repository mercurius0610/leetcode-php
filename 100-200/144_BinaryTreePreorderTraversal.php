<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($value) { $this->val = $value; }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer[]
     */
    function preorderTraversal($root) {
        $stack=[];
        $res=[];
        while ($root!=null || !empty($stack)) {
            while ($root!=null) {
                $res[]=$root->val;
                $stack[]=$root;
                $root=$root->left;
            }
            $root=array_pop($stack);
            $root=$root->right;
        }
        return $res;
    }
}
