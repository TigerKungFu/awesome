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
$node1 = null;
$node2 = null;
for ($i = 0; $i < 10; $i++){
    $key = rand(1, 1000);
    $node = new BalanceBinaryNode($key, array("age"=>"age" . $key));
    $bt->insert($node);
    if ($i == 7){
        $node1 = $node;
    }
    if ($i == 3){
        $node2 = $node;
    }
}
echo $bt;

$bt->balance();
echo $bt;

echo "Search By key: " . $bt->searchByKey($key) . "\n";
echo "Search By Value: " . $bt->search("age", "age" . $key) . "\n";
echo "Find Common Ancestor: " . $node1 . $node2 . $bt->findCommonAncestor($node1, $node2) . "\n";
