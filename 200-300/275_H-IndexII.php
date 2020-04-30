<?php
class Solution {

    /**
     * @param Integer[] $citations
     * @return Integer
     */
    function hIndex($citations) {
        if(count($citations)==0) return 0;
        $len=count($citations);
        $i=0;
        for($j=$len-1;$j>=0;$j--) {
            if($citations[$j]>=$len-$j) {$i++;}
        }
        return $i;

    }
}
class Solution2 {
    function hIndex($citations) {
        $len=count($citations);
        $i=0;$j=$len-1;
        while ($i<=$j) {
            $m=intval(($i+$j)/2);
            if($citations[$m]>$len-$m){
                $j=$m-1;
            }else {
                $i=$m+1;
            }
        }
        return $len-$i;
    }
}
//$c=[0,1,3,5,6,11,12,20,23,50];
$c=[0,1,2,3,4,5,6,7,8,9,10];
$i=new Solution2();
print_r($i->hIndex($c));
