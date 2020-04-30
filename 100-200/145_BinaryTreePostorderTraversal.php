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
     * @return Integer[]
     */
    function postorderTraversal($root) {
        $stack=[];
        $res=[];
        while ($root!=null || !empty($stack)) {
            while ($root!=null) {
                $res[]=$root->val;
                $stack[]=$root;
                $root=$root->right;
            }
            $root=array_pop($stack);
            $root=$root->left;
        }
        return array_reverse($res);
    }
}


function build($a) {
    $root=new TreeNode(array_shift($a));
    $q1=[$root];
    $q2=[];
    $left=true;
    foreach ($a as $v) {
        $curr=reset($q1);
        if($left) {
            if($v!=null) {
                $curr->left=new TreeNode($v);
                $q2[]=$curr->left;
            }
            $left=false;
        }
        else {
            if($v!=null) {
                $curr->right=new TreeNode($v);
                $q2[]=$curr->right;
            }
            $left=true;
            array_shift($q1);
        }
        if(empty($q1)) {
            $q1=$q2;
            $q2=[];
        }
    }
    return $root;
}

$a=[1,null,2,3];
$i=new Solution();
print_r($i->postorderTraversal(build($a)));



