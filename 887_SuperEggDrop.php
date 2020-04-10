<?php
class Solution {

    /**
     * @param Integer $K
     * @param Integer $N
     * @return Integer
     */
    function superEggDrop($K, $N) {
        $result = $this->dp($K, $N);
        print_r($this->mem);
        return $result;
    }

    private $mem=[];
    function dp($k, $n) {
        if(isset($this->mem[$k.$n])) return $this->mem[$k.$n];
        if($k == 1) return $n;
        if($n == 0) return 0;
        $h=null;
        for($i=1;$i<=$n+1;$i++) {
           $h=min($h, max(
               $this->dp($k, $n-$i),
               $this->dp($k-1, $i-1)
           ));
        }
        $this->mem[$k.$n] = $h;
        return $h;
    }

}

class Solution2 {
    private $mem=[];
    function superEggDrop($K, $N) {
        return $this->dp($K, $N);
    }
    function dp($k, $n) {
        if(isset($this->mem[$k.$n])) return $this->mem[$k.$n];
        if($k == 1) return $n;
        if($n == 0) return 0;
        $l=1;$r=$n;
        $h=null;
        while($l<$r){
            $mid=ceil(($l+$r)/2);
            $broken = $this->dp($k-1, $mid-1);
            $not_broken = $this->dp($k, $n-$mid);
            if($broken > $not_broken) {
                $r=$mid-1;
                $h=min($h, $broken+1);
            }
            else {
                $l=$mid+1;
                $h=min($h, $not_broken+1);
            }
        }
        $this->mem[$k.$n] = $h;
        return $h;
    }
}
class Solution3 {
    function superEggDrop($K, $N) {
        $dp=array_fill(0, $K+1, array_fill(0, $N+1, 0));
        $m=0;
        while($dp[$K][$m] < $N) {
            $m++;
            for($k=1; $k<=$K; $k++) {
                $dp[$k][$m]=$dp[$k][$m-1]+$dp[$k-1][$m-1]+1;
            }
        }
        return $m;
    }
}
$k=2;$n=50;
$i = new Solution3();
print_r($i->superEggDrop($k, $n));
