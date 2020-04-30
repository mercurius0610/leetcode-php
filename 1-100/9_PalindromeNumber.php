<?php
class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        if($x == strrev(strval($x))) return true;
        return false;
    }
}
