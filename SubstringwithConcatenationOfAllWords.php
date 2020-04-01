<?php
class Solution {

    /**
     * @param String $s
     * @param String[] $words
     * @return Integer[]
     */
    function findSubstring($s, $words) {
        $p=strlen(reset($words));
        $step=count($words)*$p;
        $res=[];
        $wordsK=[];
        foreach ($words as $v) {
            if(isset($wordsK[$v])) $wordsK[$v]++;
            else $wordsK[$v]=1;
        }
        for($i=0;$i<=strlen($s)-$step;$i++) {
            if(isset($wordsK[substr($s, $i, $p)])) {
                if($this->matchAllWords(substr($s, $i, $step), $wordsK, $p)) {
                    $res[]=$i;
                }
            }
        }
        return $res;
    }

    function matchAllWords($s, $words, $p) {
        $a=str_split($s, $p);
        foreach ($a as $i) {
            if(isset($words[$i]) && $words[$i] > 0) {
                $words[$i]--;
            }
            else {
                return false;
            }
        }
        return true;
    }

}
$s= "barfoofoobarthefoobarman";
$a= ["bar","foo","the"];
$i=new Solution();
print_r($i->findSubstring($s, $a));

