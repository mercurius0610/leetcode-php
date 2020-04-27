<?php
class LongestSubstringWithoutRepeatingCharacters
{
    public function brute_force($s) {
        $length = strlen($s);
        $result = 0;
        for($i= 0;$i<$length;$i++) {
            $char_arr = [];
            for($j=$i;$j<$length;$j++) {
                $curr = substr($s, $j, 1);
                if(in_array($curr, $char_arr)) {
                    $i=array_search($curr, $char_arr);
                    break;
                }else{
                    $char_arr[$j] = $curr;
                }
            }
            if(count($char_arr) > $result) {
                $result = count($char_arr);
                if($result == $length-$i) return $result;
            }
        }
        return $result;
    }

}

$instance = new LongestSubstringWithoutRepeatingCharacters();
$string = "abcabcbb";
print_r($instance->brute_force($string));
