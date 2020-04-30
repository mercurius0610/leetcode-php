<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    function combine($n, $k) {
        $queue=[[]];
        $res=[];
        while (!empty($queue)){
            $curr=array_shift($queue);
            if(count($curr)==$k) {
                $res[]=$curr;
                continue;
            }
            for($i=end($curr)+1;$i<=$n;$i++) {
                $next=$curr;
                $next[]=$i;
                $queue[]=$next;
            }
        }
        return $res;
    }
}
class Solution2 {
    private $res;
    function combine($n, $k) {
        $this->res=[];
        $this->helper([], 1, $n, $k);
        return $this->res;
    }

    function helper($tmp, $start, $n, $k) {
        if($k<=0) {
            $this->res[]=$tmp;
            return;
        }
        for($i=$start;$i<=$n;$i++) {
            $tmp[]=$i;
            $this->helper($tmp, $i+1, $n, $k-1);
            array_pop($tmp);
        }
    }
}
$n=4;
$k=2;
//$n = 20;
//$k = 16;
$i=new Solution2();
print_r($i->combine($n, $k));
