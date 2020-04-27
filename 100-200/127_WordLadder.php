<?php
class Solution {

    /**
     * @param String $beginWord
     * @param String $endWord
     * @param String[] $wordList
     * @return Integer
     */
    function ladderLength($beginWord, $endWord, $wordList) {
        $reached=[];
        $reached[]=$beginWord;
        // 使用hashmapO(1)查找防止TLE
        $wordDic=array_flip($wordList);
        $next_level=[];
        $distance=1;
        while(!in_array($endWord, $reached)) {
            foreach($reached as $word) {
                $originWord=$word;
                foreach(str_split($word) as $i=>$s) {
                    foreach(range('a', 'z') as $c) {
                        $word=$originWord;
                        $word[$i]=$c;
                        if(isset($wordDic[$word])) {
                            $next_level[]=$word;
                            unset($wordDic[$word]);
                        }
                    }
                }
            }
            $distance++;
            if(empty($next_level)) return 0;
            $reached=$next_level;
            $next_level=[];
        }
        return $distance;
    }

}
$beginWord = "hit";
$endWord = "cog";
$wordList = ["hot","dot","dog","lot","log","cog"];
$i=new Solution();
print_r($i->ladderLength($beginWord, $endWord, $wordList));

