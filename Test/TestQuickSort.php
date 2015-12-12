<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/10/15
 * Time: 1:00 AM
 */
require_once __DIR__ . "/../DataStructure/QuickSort.php";

$arr = array();

for ($i = 0; $i < 5; $i++){
    $arr[] = rand(1, 9999);
}

print_r($arr);
$qs = new QuickSort();
print_r($qs->sortRecursive($arr));
print_r($qs->sortIterative($arr));