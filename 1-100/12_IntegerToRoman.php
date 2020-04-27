<?php
class Solution {

    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num) {

        if($num<1||$num>3999) trigger_error("num must between 1 and 3999", E_USER_ERROR);
        $roman = "";
        $romanTen = array_reverse(self::romanTen(), true);
        $romanFive = array_reverse(self::romanFive(), true);
        foreach ($romanTen as $k=>$v) {
            $n = floor($num/$k);
            if($n==0) continue;
            if($n < 4) {
                $roman .= str_repeat($v, $n);
            }
            elseif($n == 4) {
                $roman .= $romanTen[$k] . $romanFive[$k*5];
            }
            else if($n == 9) {
                $roman .= $romanTen[$k] . $romanTen[$k*10];
            }
            else {
                $roman .= $romanFive[$k*5] . str_repeat($romanTen[$k], $n-5);
            }
            $num = $num%$k;
        }
        return $roman;

    }

    static function romanTen() {

        return [
            '1' => 'I',
            '10' => 'X',
            '100' => 'C',
            '1000' => 'M',
        ];
    }

    static function romanFive() {
        return [
            '5' => 'V',
            '50' => 'L',
            '500' => 'D',
        ];
    }

}

$num = 58;
$i = new Solution();
print_r($i->intToRoman($num));
