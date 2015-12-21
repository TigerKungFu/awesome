<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 4:29 PM
 */
require_once __DIR__ . "/../DataStructure/BubbleSort.php";
$arr = array();
for ($i = 0; $i < 20; $i++){
    $item = rand(1, 999);
    array_push($arr, $item);
}
print_r($arr);
$bs = new BubbleSort();
print_r($bs->sort($arr));