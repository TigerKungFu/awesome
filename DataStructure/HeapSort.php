<?php
/**
 * Heap Sort.
 * Best: N*log(N), Average: N*log(N), Worst: N*log(N)
 * User: zhouxiuhu
 * Date: 12/9/15
 * Time: 4:56 PM
 */
class HeapSort{
    protected function _heapify(&$arr, $key, $heapSize){
        $largest = $key;
        $l = $key * 2 + 1;
        $r = $key * 2 + 2;
        if ($l < $heapSize && $arr[$key] < $arr[$l]){
            $largest = $l;
        }
        if ($r < $heapSize && $arr[$largest] < $arr[$r]){
            $largest = $r;
        }
        if ($largest != $key){
            $tmp = $arr[$key];
            $arr[$key] = $arr[$largest];
            $arr[$largest] = $tmp;

            $this->_heapify($arr, $largest, $heapSize);
        }
    }
    protected function _buildHeap(&$arr, $heapSize){
        $len = floor($heapSize/2);
        for ($i = $len; $i >= 0; $i--){
            $this->_heapify($arr, $i, $heapSize);
        }
    }
    public function sort(&$arr){
        $heapSize = count($arr);
        $this->_buildHeap($arr, $heapSize);

        while ($heapSize--){
            $tmp = $arr[$heapSize];
            $arr[$heapSize] = $arr[0];
            $arr[0] = $tmp;

            $this->_buildHeap($arr, $heapSize);
        }
    }
    public function outputArray(&$arr){
        $size = count($arr);
        for ($i = 0; $i < $size; $i++){
            echo $arr[$i]. " ";
        }
        echo "\n";
    }
}