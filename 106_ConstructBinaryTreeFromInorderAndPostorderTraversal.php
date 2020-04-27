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
     * @param Integer[] $inorder
     * @param Integer[] $postorder
     * @return TreeNode
     */
    function buildTree($inorder, $postorder) {
        if(count($inorder)==0 || count($postorder)==0) return null;
        $stack=[];
        $root=$curr=new TreeNode(end($postorder));
        $j=0;
        $reverse = array_reverse($inorder);
        for($i=count($postorder)-2;$i>=0;$i--) {
            if($curr->val != $reverse[$j]) {
                $curr->right=new TreeNode($postorder[$i]);
                $stack[]=$curr;
                $curr=$curr->right;
            }
            else {
                $j++;
                while(!empty($stack) && end($stack)->val == $reverse[$j]) {
                    $curr=array_pop($stack);
                    $j++;
                }
                $curr=$curr->left=new TreeNode($postorder[$i]);
            }
        }
        return $root;
    }
}

class Solution2 {
    function buildTree($inorder, $postorder) {
        return $this->recursive($inorder, $postorder, 0, count($inorder)-1, 0, count($postorder)-1);
    }

    function recursive($inOrder, $postOrder, $inFrom, $inTo, $postFrom, $postTo) {
        if($inFrom>$inTo || $postFrom > $postTo) return null;
        $node=new TreeNode($postOrder[$postTo]);
        $i=array_search($node->val, $inOrder);
        $node->left=$this->recursive(
            $inOrder, $postOrder, $inFrom, $i-1, $postFrom, $postFrom-$inFrom+$i-1
        );
        $node->right=$this->recursive(
            $inOrder, $postOrder, $i+1, $inTo, $postFrom-$inFrom+$i, $postTo-1
        );
        return $node;
    }
}
$inorder = [9,3,15,20,7];
$postorder = [9,15,7,20,3];
$i=new Solution2();
print_r($i->buildTree($inorder, $postorder));
