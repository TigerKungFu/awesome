<?php
/**
 * Bubble Sort.
 * Best: N, Average: N*N, Worst: N*N
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 12:07 PM
 * Description: 5 4 1 8 2 => 5 4 1 2 8 => 5 1 4 2 8 => 1 5 4 2 8 => 1 2 5 4 8 => 1 2 4 5 8
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