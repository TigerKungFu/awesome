<?php
/**
 * Bubble Sort.
 * Best: N, Average: N*N, Worst: N*N
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 12:07 PM
 */
class BubbleSort{
    public function sort($arr){
        $len = count($arr);
        for ($i = 0; $i < $len; $i++){
            for ($j = $len - 1; $j > $i; $j--){
                if ($arr[$j] < $arr[$j - 1]){
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j-1];
                    $arr[$j-1] = $temp;
                }
            }
        }
        return $arr;
    }
}