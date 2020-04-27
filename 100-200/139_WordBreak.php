<?php
class Solution {

    /**
     * @param String $s
     * @param String[] $wordDict
     * @return Boolean
     */
    private $memo;
    function wordBreak($s, $wordDict) {
        if(isset($this->memo[$s])) return $this->memo[$s];
        if(array_search($s, $wordDict) !== false) {
            $this->memo[$s]=true;
            return true;
        }
        for($i=1;$i<strlen($s);$i++) {
            $l=substr($s, 0, $i);
            $r=substr($s, $i);
            if($this->wordBreak($l, $wordDict) && $this->wordBreak($r, $wordDict)) return true;
        }
        $this->memo[$s]=false;
        return false;
    }

    function debug_memo() {
        return $this->memo;
    }

}

class Solution2 {
   function wordBreak($s, $wordDict) {
       $dp[0]=true;
       for($i=1;$i<=strlen($s);$i++) {
           for($j=0;$j<$i;$j++) {
               if($dp[$j] && array_search(substr($s, $j, $i-$j), $wordDict) !== false) {
                   $dp[$i] = true; break;
               }
           }
       }
       return $dp[strlen($s)];
   }
}
$s="leetcode";
$wordDict=['leet', 'code'];
$i=new Solution2();
print_r($i->wordBreak($s, $wordDict));



