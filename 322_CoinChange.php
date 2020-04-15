<?php
class Solution {

    /**
     * @param Integer[] $coins
     * @param Integer $amount
     * @return Integer
     */
    private $memo;
    function coinChange($coins, $amount) {
        if(isset($this->memo[$amount])) return $this->memo[$amount];
        if($amount==0) return 0;
        if($amount<0) return -1;
        $res=null;
        foreach ($coins as $coin) {
            $subRes=$this->coinChange($coins, $amount-$coin);
            if($subRes==-1) continue;
            if(is_null($res)) $res=$subRes+1;
            else $res = min($res, $subRes+1);
        }
        $this->memo[$amount] = is_null($res) ? -1 : $res;
        return $this->memo[$amount];
    }
}
class Solution2 {
    function coinChange($coins, $amount) {
        $dp=array_fill(0, $amount+1, PHP_INT_MAX);
        $dp[0]=0;
        for($i=0;$i<=$amount;$i++)  {
            foreach($coins as $c) {
                if($i-$c < 0) continue;
                $dp[$i] = min($dp[$i], $dp[$i-$c]+1);
            }
        }
        return $dp[$amount] == PHP_INT_MAX ? -1 : $dp[$amount];
    }
}
$coins = [2];
$amount=3;
$i=new Solution2();
$res=$i->coinChange($coins, $amount);
print_r($res);
