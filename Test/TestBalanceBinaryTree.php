<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/7/15
 * Time: 11:41 PM
 */
require_once __DIR__ . "/../DataStructure/BalanceBinaryTree.php";

$bt = new BalanceBinaryTree();
$key = null;
for ($i = 0; $i < 10; $i++){
    $key = rand(1, 1000);
    $node = new BalanceBinaryNode($key, array("age"=>"age" . $key));
    $bt->insert($node);
}
echo $bt;

$bt->balance();
echo $bt;

echo "Search By key: " . $bt->searchByKey($key) . "\n";
echo "Search By Value: " . $bt->search("age", "age" . $key) . "\n";
