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
     * @param Integer[] $preorder
     * @param Integer[] $inorder
     * @return TreeNode
     */
    function buildTree($preorder, $inorder) {
        if(count($preorder)==0) return null;
        $stack=[];
        $root = new TreeNode(reset($preorder));
        $curr=$root;
        $j=0;
        for($i=1;$i<count($preorder);$i++) {
            if($curr->val!=$inorder[$j]) {
                $curr->left=new TreeNode($preorder[$i]);
                $stack[]=$curr;
                $curr=$curr->left;
            }
            else {
                $j++;
                while(!empty($stack) && end($stack)->val == $inorder[$j]) {
                    $curr=array_pop($stack);
                    $j++;
                }
                $curr->right= new TreeNode($preorder[$i]);
                $curr=$curr->right;
            }
        }
        return $root;
    }

}

class Solution2 {
    /*
     * recursive
     */
    function buildTree($preorder, $inorder) {
        return $this->recursive($preorder, $inorder);
    }

    function recursive($preOrder, $inOrder) {
        if(empty($preOrder) || empty($inOrder)) return null;
        $root=new TreeNode(reset($preOrder));
        $i=array_search($root->val, $inOrder);
        $root->left=$this->recursive(
            array_slice($preOrder, 1, $i),
            array_slice($inOrder, 0, $i)
        );
        $root->right=$this->recursive(
            array_slice($preOrder, $i+1),
            array_slice($inOrder, $i+1)
        );
        return $root;
    }
}

$preorder = [3,9,20,15,7];
$inorder = [9,3,15,20,7];
$i=new Solution2();
print_r($i->buildTree($preorder, $inorder));
