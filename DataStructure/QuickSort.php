<?php
/**
 * Quick Sort, 顺序排列.
 * Best: N*log(N), Average: N*log(N), Worst: N*N
 * User: zhouxiuhu
 * Date: 12/10/15
 * Time: 12:36 AM
 */
class QuickSort{
    public function sortRecursive($arr){
        if ($arr == null || count($arr) == 0){
            return array();
        }
        $pivot = $arr[0];
        $left = $right = array();
        $len = count($arr);

        for($i = 1; $i < $len; $i++){
            if ($arr[$i] < $pivot){
                $left[] = $arr[$i];
            }else{
                $right[] = $arr[$i];
            }
        }
        return array_merge($this->sortRecursive($left), array($pivot), $this->sortRecursive($right));
    }
    public function sortIterative($arr){
        $sorted = array();
        $stack = array();
        if ($arr == null){
            return null;
        }
        array_push($stack, $arr);
        while (count($stack) > 0){
            $item = array_pop($stack);
            if (count($item) == 1){
                $sorted[] = $item[0];
                continue;
            }
            $pivot = $item[0];
            $left = $right = array();
            $len = count($item);
            for ($i = 1; $i < $len; $i++){
                if ($item[$i] < $pivot){
                    $left[] = $item[$i];
                }else{
                    $right[] = $item[$i];
                }
            }
            $left[] = $pivot;
            if (count($right)){
                array_push($stack, $right);
            }
            if (count($left)){
                array_push($stack, $left);
            }
        }
        return $sorted;
    }
}