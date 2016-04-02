<?php
/**
 * Insertion Sort.
 * Best: N, Average: N*N, Worst: N*N
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 12:08 PM
 * Description: 8 3 5 4 => 3 8 5 4 => 3 5 8 4 => 3 4 5 8
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