<?php
/**
 * Heap Sort.
 * Best: N*log(N), Average: N*log(N), Worst: N*log(N)
 * User: zhouxiuhu
 * Date: 12/9/15
 * Time: 4:56 PM
 * Description: 升序排列，需要最大堆
 */
class HeapSort{
    /**
     * 建立最大堆
     * @param $arr 堆
     * @param $key 堆顶
     * @param $heapSize 堆大小
     * @description 1 5 3 2 4 => 5 1 3 2 4 => 5 4 3 2 1
     */
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

            //一直往下调整
            $this->_heapify($arr, $largest, $heapSize);
        }
    }

    /**
     * @param $arr
     * @param $heapSize
     * @description 1 2 3 4 5 => 1 2 3 4 5 => 1 5 3 4 2 => |5 1 3 4 2| => 5 4 3 1 2
     */
    protected function _buildHeap(&$arr, $heapSize){
        $len = floor($heapSize/2);
        for ($i = $len; $i >= 0; $i--){
            $this->_heapify($arr, $i, $heapSize);
        }
    }

    /**
     * @param $arr
     * @description 5 4 3 1 2 => 4 3 1 2 ,5=> 3 1 2 ,4 5 => 1 2, 3 4 5 => 2 1, 3 4 5 => 1 2 3 4 5
     */
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