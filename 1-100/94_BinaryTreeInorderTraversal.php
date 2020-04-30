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
    function inorderTraversal($root) {
        $stack=[];
        $res=[];
        while($root!=null || !empty($stack)) {
            while ($root!=null) {
                $stack[]=$root;
                $root=$root->left;
            }
            $root=array_pop($stack);
            $res[]=$root->val;
            $root=$root->right;
        }
        return $res;
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
$a=[1,null,2,3];
$i=new Solution();
print_r($i->inorderTraversal(build($a)));
