<?php
/**
 * Bucket Sort.
 * O(N)
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 5:18 PM
 * Description: 适合数值较小的排序，浪费空间
 */
class BucketSort{
    public function sort($arr){
        $standard = array();
        $len = count($arr);
        $max = 0;
        for ($i = 0; $i < $len; $i++){
            if ($arr[$i] > $max){
                $max = $arr[$i];
            }
            if (isset($standard[$arr[$i]])){
                $standard[$arr[$i]]++;
            }else{
                $standard[$arr[$i]] = 1;
            }
        }
        $k = 0;
        for($j = 0; $j <= $max; $j++){
            if (isset($standard[$j])){
                for ($m = 1; $m <= $standard[$j]; $m++){
                    $arr[$k++] = $j;
                }
            }
        }
        return $arr;
    }
}