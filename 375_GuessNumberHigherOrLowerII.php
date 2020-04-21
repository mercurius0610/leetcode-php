<?php
class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function getMoneyAmount($n) {
        $t=[];
        $res= $this->get($t, 1, $n);
        print_r($t);
        return $res;
    }

    function get(&$t, $s, $e) {
        if($s>=$e) return 0;
        if(isset($t[$s][$e])) return $t[$s][$e];
        $res=PHP_INT_MAX;
        for($i=$s;$i<=$e;$i++) {
            $tmp = $i+max($this->get($t, $s, $i-1), $this->get($t, $i+1, $e));
            $res=min($res, $tmp);
        }
        $t[$s][$e]=$res;
        return $res;
    }

}
$n=20;
$i=new Solution();
print_r($i->getMoneyAmount($n));
