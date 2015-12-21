<?php
/**
 * Insertion Sort.
 * Best: N, Average: N*N, Worst: N*N
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 12:08 PM
 */
class InsertionSort{
    public function sort($arr){
        $len = count($arr);
        for ($i = 1; $i < $len; $i++){
            $tmp = $arr[$i];
            $j = $i;
            while ($j > 0 && $arr[$j - 1] > $tmp){
                $arr[$j] = $arr[$j - 1];
                $j--;
            }
            $arr[$j] = $tmp;
        }
        return $arr;
    }
}