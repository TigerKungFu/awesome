<?php
/**
 *
 *给你一个仅由小写字母组成的字符串。你的任务是找出一个位置，删掉那个字母之后，字符串变成回文的。总会有一个合法的解。如果给定的字符串是一个回文串，
 * 那么-1也将被当作其中一个合法的解。
 * 输入格式
 * 第一行包含T，测试数据的组数。
 * 后面跟有T行，每行包含一个字符串。
 * 输出格式
 * 如果可以删去一个字母使它变成回文串，则输出任意一个满足条件的删去字母的位置（下标从0开始）。例如：
 *
 * bcbc
 * 我们可以删掉位置0的b字符，或者位置3的c字符。两个答案都是正确的。
 * 约束条件
 * 1 ≤ T ≤ 20
 * 1 ≤ 字符串的长度 ≤ 100005 所有字符都是小写字母
 *
 * 输入样例 #00
 *
 * 3
 * aaab
 * baa
 * aaa
 * 输出样例 #00
 * 3
 * 0
 * -1
 * 解释
 * 在给定的输入中，T =3 +对于输入aaab,我们可以发现删掉字母b可以使得原串变为回文串，因此输出位置3。 +对于输入baa,
 * 我们可以发现删掉字母b可以使得原串变为回文串，因此输出位置0。 +对于输入aaa,我们发现它已经是回文串了，所以输出-1。
 * User: zhouxiuhu
 * Date: 3/16/16
 * Time: 9:54 AM
 */
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, "%d", $num);
while($num){
    $str = trim(fgets($_fp));
    $strarr = str_split($str);
    $len = count($strarr);
    for ($i=0, $j=$len-1; $i<(int)($len/2) && $i<$j; $i++,$j--){
        if ($strarr[$i] != $strarr[$j]){
            if ($strarr[$i+1] == $strarr[$j] && $strarr[$i] == $strarr[$j-1]){
                $m = $i + 2;
                $n = $j - 2;
                $check = true;
                while($m<$n){
                    if ($strarr[$m] == $strarr[$n+1] && $strarr[$m-1] == $strarr[$n]){
                        continue;
                    }else if ($strarr[$m] == $strarr[$n+1]){
                        echo $i . "\n";
                        $check = false;
                        break;
                    }else if ($strarr[$m-1] == $strarr[$n]){
                        echo $j . "\n";
                        $check = false;
                        break;
                    }
                }
                if ($check){
                    echo $i . "\n";
                }
            }else if ($strarr[$i+1] == $strarr[$j]){
                echo $i . "\n";
            }else if ($strarr[$i] == $strarr[$j-1]){
                echo $j . "\n";
            }
            break;
        }
    }
    if ($i == (int)($len/2)){
        echo "-1\n";
    }
    $num--;
}
fclose($_fp);
?>