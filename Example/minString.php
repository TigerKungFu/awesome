<?php
/*
Write a function that takes an input string and returns the minimum substring which contains every letter of the alphabet at least once.

Example:

Input: "aaccbc"
Alphabet: "abc"
Output: "accb"

*/
function minSubString($str, $alp){
    $strArr = str_split($str);
    $alpStr = str_split($alp);
    $alpArr = array();

    for($j = count($alpStr)-1; $j>=0; $j--){
        $alpArr[$alpStr[$j]] = 0;
    }
    $sLen = count($strArr);
    $aLen = count($alpArr);
    $start = -1;
    $minStart = -1;
    $minEnd = -1;
    $noIn = -1;
    for ($i=0; $i<$sLen; $i++){
        if (isset($alpArr[$strArr[$i]])){
            if ($alpArr[$strArr[$i]] == 0){
                if ($start == -1){
                    $start = $i;
                }
                $alpArr[$strArr[$i]] = 1;
            }else if($alpArr[$strArr[$i]] == 1 && ($start == $i-1)){
                $start++;
            }
        }else{
            $noIn = $i;
        }
        $m = 0;
        foreach($alpArr as $item){
            if ($item == 0){
                break;
            }
            $m++;
        }
        if ($m == $aLen){
            $end = $i;
            echo $start." ".$end. " ".$noIn."\n";
            if ($minEnd == -1){
                $minStart = $start;
                $minEnd = $end;
                $i = $minStart;
            }else if (($end - $start) < ($minEnd - $minStart)){
                $minStart = $start;
                $minEnd = $end;
                $i = $minStart;
            }
            $start = -1;
            if ($noIn != -1){
                $i = $noIn;
                $noIn = -1;
            }
            for($j = count($alpStr)-1; $j>=0; $j--){
                $alpArr[$alpStr[$j]] = 0;
            }

        }
    }
    if ($minEnd == -1){
        return false;
    }
    return substr($str, $minStart, ($minEnd - $minStart + 1));
}
echo minSubString("aaccbccdazbeecdabc", "azedbc");

?>