<?php
/**
 * Watson给了Sherlock一个包含N个整数的数组 A0, A1 ... AN-1。 现在Watson问，存在多少对下标i和_j_，满足 i不等于j并且Ai = Aj
 *
 * 即, Sherlock要计算有多少对下标(i, j)
 * 满足 Ai = Aj 并且 i ≠ j。
 *
 * 输入格式
 * 第一行包含整数 T, 测试数据的组数. 后面跟T组测试数据。
 * 每组测试数据有两行，第一行包含一个整数N,数组的大小。 下一行包含N个空白分隔的整数。
 *
 * 输出格式
 * 对每组测试数据,输出一行表示答案。
 *
 * 约束条件
 * 1 ≤ T ≤ 10
 * 1 ≤ N ≤ 105
 * 1 ≤ A[i] ≤ 106
 *
 * 输入样例
 *
 * 2
 * 3
 * 1 2 3
 * 3
 * 1 1 2
 * 输出样例
 *
 * 0
 * 2
 * 解释
 * 第一组测试数据中， 没有满足条件的下标对。
 * 第二组测试数据中，因为A[0] = A[1], 所以下标对(0,1)和(1,0)满足条件。
 * User: zhouxiuhu
 * Date: 3/23/16
 * Time: 1:04 AM
 */
function sherlock($_fp){
    $count = 0;
    $list = array();
    fscanf($_fp, "%d", $len);
    $str = rtrim(fgets($_fp));
    $item = explode(" ", $str);
    for ($i=0; $i<$len; $i++){
        if (isset($list[$item[$i]])){
            $list[$item[$i]]++;
        }else{
            $list[$item[$i]] = 1;
        }
    }
    foreach($list as $one){
        $count += $one*($one-1);
    }
    echo $count . "\n";
}
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, "%d", $num);
for ($i=0; $i<$num; $i++){
    sherlock($_fp);
}
fclose($_fp);
?>