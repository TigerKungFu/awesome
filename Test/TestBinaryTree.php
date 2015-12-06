<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/6/15
 * Time: 3:14 PM
 */
require_once __DIR__ . "/../DataStructure/BinaryTree.php";

$n1 = new Node(123);
$n2 = new Node(12);
$n3 = new Node(32);
$n4 = new Node(453);
$n5 = new Node(1);
$n6 = new Node(90);

$bt = new BinaryTree();
$bt->insert($n1);
//echo $bt;
$bt->insert($n2);
$bt->insert($n3);
$bt->insert($n4);
$bt->insert($n5);
$bt->insert($n6);

echo $bt;

echo $bt->search($n6);