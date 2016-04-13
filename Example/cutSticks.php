<?php
/**
 * 给你N根长度不相等的木棍。有一种切割操作：把所有的木棍都切成最短的高度，并记录下切下来的宽度（木棍数），扔掉切下的部分。
 * 重复这种切割操作，直到所有的木棍都被扔掉。 你需要输出每次切割下记录的宽度（木棍数）。
 *
 * 输入格式
 *
 * 第一行包含N, 下一行包含个空格分隔的数 Ai。
 *
 * 输出格式
 *
 * 输出每次操作切下的木棍宽度。
 *
 * 约束条件
 *
 * 1 <= N <= 1000
 * 1 <= Ai <= 1000
 *
 * 输入样例
 *
 * 8
 * 1 2 3 4 3 3 2 1
 * 输出样例
 *
 * 8
 * 6
 * 4
 * 1
 * Explanation
 *
 * 其中有8跟木棍，都要切除高度为1的一段(因为 1是最短的高度). 把切下的8根放在一边后，我们还剩余6根木棍，高度分别为 1,2,3,2,2,1。
 * 我们再一次切下现在的最短高度1，扔掉切下的6段后，我们还剩下4段高度分别为1，2，1，1。 再切一次我们剩下1段高度为1的木棍，
 * 本身再切一次才能扔掉。
 *
 * 因此输出 8,6,4,1
 * User: zhouxiuhu
 * Date: 4/7/16
 * Time: 11:54 PM
 */
//逆向思维
function cutSticks($list, $n){
    //由于N<=1000，可以使用Bucket Sort
    $idx = array();
    for ($i=0; $i<$n; $i++){
        if (isset($idx[$list[$i]])){
            $idx[$list[$i]]++;
        }else{
            $idx[$list[$i]] = 1;
        }
    }
    $remain = $n;
    for ($i=0; $i<=1000; $i++){
        if (isset($idx[$i])){
            echo $remain . "\n";
            $remain -= $idx[$i];
        }
    }

}
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$n);
$arr_temp = rtrim(fgets($handle));
$arr = explode(" ",$arr_temp);
array_walk($arr,'intval');
cutSticks($arr, $n);

?>
