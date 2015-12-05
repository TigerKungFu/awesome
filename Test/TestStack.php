<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/6/15
 * Time: 1:20 AM
 */
require_once __DIR__ . "/../DataStructure/Stack.php";

$s = new Stack();
$s->push(123);
$s->push(145);
$s->push("ccccc");
$s->push(true);
echo $s;

$s->pop();
echo $s;