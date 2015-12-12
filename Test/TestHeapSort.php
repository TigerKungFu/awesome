<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/9/15
 * Time: 5:27 PM
 */
require_once __DIR__ . "/../DataStructure/HeapSort.php";

$arr = array();
for ($i = 0; $i < 1000; $i++){
    $v = rand(1, 999999);
    $arr[] = $v;
}

$hs = new HeapSort();
$hs->outputArray($arr);
$timeS = time();
$hs->sort($arr);
$timeE = time();
$hs->outputArray($arr);
echo $timeE - $timeS;