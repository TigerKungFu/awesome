<?php
/**
 * Test LinkedList.php
 * User: zhouxiuhu
 * Date: 12/3/15
 * Time: 12:57 AM
 */
require_once __DIR__ . "/../DataStructure/LinkedList.php";

$num = 1000;
$ll = new LinkedList();
for ($i = 1; $i<= $num; $i++){
    $ll->insert(new Item($i));
}
echo $ll;
?>