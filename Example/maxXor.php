<?php
/**
 * 给定两个整数：L 和 R
 *
 * ∀ L ≤ A ≤ B ≤ R, 找出 A xor B 的最大值。
 *
 * 输入格式
 *
 * 第一行为 L
 * 第二行为 R
 *
 * 数据范围
 *
 * 1 ≤ L ≤ R ≤ 103
 *
 * 输出格式
 *
 * 输出最大的异或和
 *
 * 样例输入
 *
 * 1
 * 10
 * 样例输出
 *
 * 15
 * 样例解释
 *
 * 当B = 10, A = 5时，异或和最大。
 * 1010 xor 0101 = 1111，所以答案是 15.
 * User: zhouxiuhu
 * Date: 4/7/16
 * Time: 11:17 PM
 */
// xor值最大即每一位都为1，从最高位开始
function maxXor( $l,  $r) {
    $res = $l ^ $r; // 确保$res的最高位为1，因为$r的最高位肯定为1
    $res = $res | $res >> 1; // 最高位和次高位取或运算，保证最高位和次高位均为1
    $res = $res | $res >> 2; // 最高位和次高位均已经为1，平移两位可以保证前四位为1
    $res = $res | $res >> 4; // 前四位为1，平移两位可以保证前8位为1
    $res = $res | $res >> 8; // 前八位为1的值是，平移两位可以保证前16位为1，最大值为2的16次方-1，即1024*64
    //由于这里最大值为1000，最后一步只需要右移两位即可，为了保持算法一致，用移8位，倍数的方式
    return $res;
}

$__fp = fopen("php://stdin", "r");
fscanf($__fp, "%d", $_l);
fscanf($__fp, "%d", $_r);

$res = maxXor($_l, $_r);
echo $res;

?>