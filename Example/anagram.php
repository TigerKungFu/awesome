<?php
function anagrams($arr){
    if (!$arr || !is_array($arr)){
        return $arr;
    }
    $eqs = array();
    foreach($arr as $item){
        $itemarr = str_split($item);
        //sort string
        sort($itemarr);
        //array to string
        array_push($eqs, implode($itemarr));
    }
    $len = count($eqs);
    $outputs = array();
    for($i=0; $i<$len; $i++){
        if ($eqs[$i] != null){
            // didn't check before
            array_push($outputs, $i);
            for ($j=$i+1; $j<$len; $j++){
                // equals string, cat(act) act(act)
                if ($eqs[$i] == $eqs[$j]){
                    array_push($outputs, $j);
                    $eqs[$j] = null;
                }
            }
        }
    }
    // outputs(0,2, 1...)_
    for ($m=0; $m<$len; $m++){
        echo $arr[$outputs[$m]] . " ";
    }
    return;
}
$temp = array("cat", "bat", "act", "tab", "act", "tic", "tac");
anagrams($temp);
?>