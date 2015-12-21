<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/12/15
 * Time: 5:23 PM
 */
require_once __DIR__ . "/../DataStructure/BucketSort.php";

$arr = array();
for($i = 0; $i < 20; $i++){
    array_push($arr, rand(1, 9999));
}
print_r($arr);
$bs = new BucketSort();
print_r($bs->sort($arr));