<?php
class Solution {

    /**
     * @param String $start
     * @param String $end
     * @param String[] $bank
     * @return Integer
     */
    function minMutation($start, $end, $bank) {
        $min=PHP_INT_MAX;
        $base=["A", "C", "G", "T"];
        $map=[];
        foreach ($bank as $v) {
            $map[$v]=1;
        }
        $this->helper($start, $end, $map, 0, $base, $min);
        if($min==PHP_INT_MAX) return -1;
        return $min;
    }

    function helper($current, $end, $map, $count, $base, &$min) {
        if($current==$end) {
            $min=min($count, $min);
            return ;
        }
        for($i=0;$i<strlen($current);$i++) {
            foreach ($base as $v) {
                if($v==$current[$i]) continue;
                $next=$current;
                $next[$i]=$v;
                if(!isset($map[$next])) continue;
                unset($map[$next]);
                $this->helper($next, $end, $map, $count+1, $base, $min);
                $map[$next]=1;
            }
        }
    }

}
