<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 3:35 PM
 */
require_once __DIR__ . "/../DataStructure/MergeSort.php";

$arr = array();
for ($i = 0; $i < 50; $i++){
    $item = rand(1, 999999);
    array_push($arr, $item);
}

print_r($arr);
$ms = new MergeSort();
print_r($ms->sortRecursive($arr));
print_r($ms->sortIterative($arr));