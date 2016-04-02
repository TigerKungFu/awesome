<?php
/**
 * Merge Sort.
 * Best: N*log(N), Average: N*log(N), Worst: N*log(N)
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 11:56 AM
 */
class MergeSort{
    public function sortRecursive($arr){
        if (count($arr) <= 1){
            return $arr;
        }
        $left = array_slice($arr, 0, (int)count($arr)/2);
        $right = array_slice($arr, (int)count($arr)/2);

        $left = $this->sortRecursive($left);
        $right = $this->sortRecursive($right);

        //每次递归merge完都是有序的array
        return $this->_merge($left, $right);
    }
    protected function _merge($left, $right){
        $result = array();

        while (count($left)>0 && count($right)>0){
            if ($left[0] <= $right[0]){
                array_push($result, array_shift($left));
            }else{
                array_push($result, array_shift($right));
            }
        }
        //将left和right加到结尾
        array_splice($result, count($result), 0, $left);
        array_splice($result, count($result), 0, $right);

        return $result;
    }
    public function sortIterative($arr){
        if (count($arr) <= 1){
            return $arr;
        }
        $stack = array();
        for ($i = 0; $i < count($arr); $i++){
            array_push($stack, array($arr[$i]));
        }
        while (count($stack) > 1) {
            $left = array_shift($stack);
            $right = array_shift($stack);
            $mergeItem = $this->_merge($left, $right);
            array_push($stack, $mergeItem);
        }
        return array_shift($stack);
    }
}