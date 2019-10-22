<?php

class Solution
{

    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $result = substr($s, 0, 1);
        for ($i = 1; $i <= strlen($s); $i++) {
            for ($j = $i + 1; $j <= strlen($s); $j++) {
                if (strlen($result) > ceil(($j - $i))) continue;
                if (($j - $i + 1) % 2 == 0) {
                    if (substr($s, $i - 1, ($j - $i + 1) / 2) == strrev(substr($s, $i + ($j - $i + 1) / 2 - 1, ($j - $i + 1) / 2))) {
                        $result = substr($s, $i-1, ($j - $i + 1));
                    }
                } else {
                    if (substr($s, $i - 1, floor(($j - $i + 1) / 2)) == strrev(substr($s, $i + ceil(($j - $i + 1) / 2) - 1, floor(($j - $i + 1) / 2)))) {
                        $result = substr($s, $i-1, ($j - $i + 1));
                    }
                }
            }
        }
        return $result;
    }
}

class Solution2 {

    /**
     * Manacher's algorithm
     */

    function pre_string($s) {
        return "#".implode("#",str_split($s))."#";
    }

    function longestPalindrome($s) {
        $ss = $this->pre_string($s);
        $rl = [];
        $MaxRight=0;
        $pos=0;
        $MaxLen=1;
        $index=0;
        for($i=0; $i<=strlen($ss); $i++) {
            if ($i<$MaxRight ) {
                $rl[$i]=min($rl[2*$pos-$i], $MaxRight-$i);
            }
            else {
                $rl[$i]=1;
            }
            while ($i-$rl[$i]>=0 and $i+$rl[$i]<strlen($ss) and $ss[$i-$rl[$i]]==$ss[$i+$rl[$i]]) {
                $rl[$i]+=1;
            }
            if ($rl[$i]+$i-1>$MaxRight) {
                $MaxRight=$rl[$i]+$i-1;
                $pos=$i;
            }
            if($MaxLen < $rl[$i]) {
                $MaxLen=$rl[$i];
                $index = $i;
            }
        }
        $MaxLen = $MaxLen - 1;
        return substr($s, intval(($index-$MaxLen)/2),$MaxLen);
    }

}

class Solution3 {
    /**
     * Manacher's 优化
     */

    public function longestPalindrome($s) {
        $is_pal=[];
        $maxLen=1;
        $index=0;
        for($i=0;$i<strlen($s);$i++) {
            $j=$i;
            while($j>0) {
                if($s[$j] == $s[$i] && ($i-$j<2 || (isset($is_pal[$j+1][$i-1]) && $is_pal[$j+1][$i-1]))) {
                    $is_pal[$j][$i]=true;
                    if($maxLen<$i-$j+1) {
                        $maxLen=$i-$j+1;
                        $index = $j;
                    }
                }
                $j--;
            }
        }
        return substr($s, $index, $maxLen);
    }
}


#$string = "mwwfjysbkebpdjyabcfkgprtxpwvhglddhmvaprcvrnuxifcrjpdgnktvmggmguiiquibmtviwjsqwtchkqgxqwljouunurcdtoeygdqmijdympcamawnlzsxucbpqtuwkjfqnzvvvigifyvymfhtppqamlgjozvebygkxawcbwtouaankxsjrteeijpuzbsfsjwxejtfrancoekxgfyangvzjkdskhssdjvkvdskjtiybqgsmpxmghvvicmjxqtxdowkjhmlnfcpbtwvtmjhnzntxyfxyinmqzivxkwigkondghzmbioelmepgfttczskvqfejfiibxjcuyevvpawybcvvxtxycrfbcnpvkzryrqujqaqhoagdmofgdcbhvlwgwmsmhomknbanvntspvvhvccedzzngdywuccxrnzbtchisdwsrfdqpcwknwqvalczznilujdrlevncdsyuhnpmheukottewtkuzhookcsvctsqwwdvfjxifpfsqxpmpwospndozcdbfhselfdltmpujlnhfzjcgnbgprvopxklmlgrlbldzpnkhvhkybpgtzipzotrgzkdrqntnuaqyaplcybqyvidwcfcuxinchretgvfaepmgilbrtxgqoddzyjmmupkjqcypdpfhpkhitfegickfszermqhkwmffdizeoprmnlzbjcwfnqyvmhtdekmfhqwaftlyydirjnojbrieutjhymfpflsfemkqsoewbojwluqdckmzixwxufrdpqnwvwpbavosnvjqxqbosctttxvsbmqpnolfmapywtpfaotzmyjwnd";
$string = "bb";
$instance = new Solution2();
$result = $instance->longestPalindrome($string);
print_r($result);
