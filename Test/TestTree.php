<?php
/**
 * Created by PhpStorm.
 * User: zhouxiuhu
 * Date: 12/9/15
 * Time: 2:43 PM
 */
require_once __DIR__ . "/../DataStructure/Tree.php";

$tn1 = new TreeNode(999, "It's root");
$tn2 = new TreeNode(123, "It's root child");
$tn3 = new TreeNode(234, "It's root child");
$tn4 = new TreeNode(345, "It's root child");
$tn5 = new TreeNode(111, "It's root grandson");
$tn6 = new TreeNode(222, "It's root grandson");
$tn7 = new TreeNode(1001, "It's root grand grand son");
$tn8 = new TreeNode(1002, "It's root grand grand son");
$tn9 = new TreeNode(1003, "It's root grand grand son");
$tn10 = new TreeNode(11000, "It's root grand grand grand son");
$t = new Tree($tn1);
$tn1->addChildren($tn2);
$tn1->addChildren($tn3);
$tn1->addChildren($tn4);

$tn2->addChildren($tn5);
$tn4->addChildren($tn6);

$tn5->addChildren($tn7);
$tn6->addChildren($tn8);
$tn5->addChildren($tn9);

$tn9->addChildren($tn10);

echo $t;

echo "Search By Key: " . $t->searchByKey(11000) . "\n";

echo "Common Ancestor: " . $t->findCommonAncestor($tn7, $tn9) . "\n";
