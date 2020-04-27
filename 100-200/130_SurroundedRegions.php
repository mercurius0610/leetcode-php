<?php
class Solution {

    /**
     * @param String[][] $board
     * @return NULL
     */
    function solve(&$board) {
        $queue=[];
        $col_l=count(reset($board));
        $row_l=count($board);
        foreach ($board as $m=>$row) {
            foreach ($row as $n=>$item) {
                if(($m==0 || $n==0 || $m==$row_l-1 || $n == $col_l-1 )&& $item=='O') {
                    $queue[]=[$m,$n];
                    while (!empty($queue)) {
                        list($i, $j) = array_pop($queue);
                        $board[$i][$j]='B';
                        if(isset($board[$i-1][$j]) && $board[$i-1][$j]=='O') $queue[]=[$i-1, $j];
                        if(isset($board[$i][$j-1]) && $board[$i][$j-1]=='O') $queue[]=[$i, $j-1];
                        if(isset($board[$i+1][$j]) && $board[$i+1][$j]=='O') $queue[]=[$i+1, $j];
                        if(isset($board[$i][$j+1]) && $board[$i][$j+1]=='O') $queue[]=[$i, $j+1];
                    }
                }
            }
        }
        foreach ($board as $m=>$row) {
            foreach ($row as $n=>$item) {
                if($item=='B') $board[$m][$n]='O';
                elseif($item=='O') $board[$m][$n]='X';
            }
        }
        return null;
    }
}
$a=[["X","X","X","X"],["X","O","O","X"],["X","X","O","X"],["X","O","X","X"]];
$i=new Solution();
$i->solve($a);
print_r($a);

