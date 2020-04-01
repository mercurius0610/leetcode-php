<?php
class Solution {

    /**
     * @param Integer $n
     * @return String[]
     */
    function generateParenthesis($n) {
        $res=[];
        $this->backtrack($n, 1, [], "", $res);
        return $res;
    }

    function backtrack($n, $pos, $stack, $s, &$res) {
        if(strlen($s) == $n*2) {
            $res[]=$s;
            return ;
        }
        if($pos==1) {
            $s.="(";
            $stack[] = ")";
            $this->backtrack($n, $pos+1, $stack, $s, $res);
        }
        elseif (count($stack) > 2*$n-$pos) {
            $s.=")";
            array_pop($stack);
            $this->backtrack($n, $pos+1, $stack, $s, $res);
        }
        else {
            $stack2 = $stack; $stack2[]=")";
            $this->backtrack($n, $pos+1, $stack2, $s."(",$res);
            if(count($stack)>0) {
                array_pop($stack);
                $this->backtrack($n, $pos+1, $stack, $s.")", $res);
            }
        }

    }

}
$n=3;
$i=new Solution();
print_r($i->generateParenthesis($n));


