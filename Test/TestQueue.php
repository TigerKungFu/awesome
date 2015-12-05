<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/6/15
 * Time: 2:23 AM
 */
require_once __DIR__ . "/../DataStructure/Queue.php";

$q = new Queue();
$q->insert(123);
$q->insert("aabc");
$q->insert(445);
$q->insert("ccc");
echo $q;

$q->delete();
echo $q;

$q->delete();
$q->delete();
echo $q;
?>