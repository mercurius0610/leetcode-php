<?php
class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return String[]
     */
    function wordBreak($s, $wordDict) {
        $dp = array_fill(0, strlen($s)+1, []);
        for($i=0;$i<=strlen($s);$i++) {
            for($j=0;$j<$i;$j++) {
                $substr = substr($s, $j, $i-$j);
                if((!empty($dp[$j]) || $j==0)&& array_search($substr, $wordDict) !== false) {
                    if($j==0) {
                        $dp[$i]=[$substr];
                    } else {
                        $dp[$i] = array_merge($dp[$i],
                            array_map(function ($v) use ($substr) {
                                return $v." ". $substr;
                            }, $dp[$j])
                        );
                    }
                }
            }
        }
        return $dp[strlen($s)];
    }

}

$s="aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaabaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
$wordDict=["a","aa","aaa","aaaa","aaaaa","aaaaaa","aaaaaaa","aaaaaaaa","aaaaaaaaa","aaaaaaaaaa"];
$i=new Solution();
print_r($i->wordBreak($s, $wordDict));


