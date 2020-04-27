<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isSubsequence($s, $t) {
        $i=0;
        $len=strlen($s);
        if($len==0) return true;
        for ($j=0;$j<strlen($t);$j++) {
            if($s[$i] == $t[$j]) {
                $i++;
                if($i==$len) return true;
            }
        }
        return false;
    }
}

class Solution2 {
    function isSubsequence($s, $t)
    {
        $memo=[];
        for($i=0;$i<strlen($t);$i++) {
            $memo[$t[$i]][]=$i;
        }
        $j=0;
        for($i=0;$i<strlen($s);$i++) {
            $index=$s[$i];
            if(!isset($memo[$index])) return false;
            $pos=$this->left_bound($memo[$s[$i]], $j);
            if($pos == count($memo[$s[$i]])) return false;
            $j=$memo[$index][$pos]+1;
        }
        return true;
    }

    function left_bound($arr, $s){
        $l=0;$r=count($arr);
        while($l < $r) {
            $m=intval(($l+$r)/2);
            if($s > $arr[$m]) {
                $l++;
            }else {
                $r--;
            }
        }
        return $l;
    }

}
#$s="axc";
#$t="ahbgdc";
$s="acb";
$t="ahbgdc";
$i=new Solution2();
var_dump($i->isSubsequence($s, $t));
