<?php
/**
 * TIPS：
 * 1. although the program can be written without defining a function to do the work (as it only needs to solve one case),
 * accessing file scope variables is slower than function scope variables
 * 2. Instead of defining 2d matrix inside a function, define it globally.
 * In this way it will acquire data segment instead of stack memory.
 *
 * Given two strings aa and bb of equal length, what's the longest string (SS) that can be constructed such that it is
 * a child of both? A string xx is said to be a child of a string yy if xx can be formed by deleting 0 or more
 * characters from yy.For example, ABCD and ABDC has two children with maximum length 3, ABC and ABD. Note that we will
 * not consider ABCD as a common child because C doesn't occur before D in the second string.
 * Input format
 * Two strings, aa and bb, with a newline separating them.
 * Constraints
 * All characters are upper cased and lie between ASCII values 65-90. The maximum length of the strings is 5000.
 * Output format
 * Length of string SS.
 * Sample Input #0
 * HARRY
 * SALLY
 * Sample Output #0
 * 2
 * The longest possible subset of characters that is possible by deleting zero or more characters from HARRY and SALLY
 * is AY, whose length is 2.
 * Sample Input #1
 * AA
 * BB
 * Sample Output #1
 * 0
 * AA and BB has no characters in common and hence the output is 0.
 * Sample Input #2
 * SHINCHAN
 * NOHARAAA
 * Sample Output #2
 * 3
 * The largest set of characters, in order, between SHINCHAN and NOHARAAA is NHA.
 * Sample Input #3
 * ABCDEF
 * FBDAMN
 * Sample Output #3
 * 2
 * BD is the longest child of these strings.
 *
 * User: zhouxiuhu
 * Date: 3/18/16
 * Time: 12:14 AM
 */
// 疯转函数的效率要高于直接脚本执行
function commonChild($s1, $s2){
    $arr1 = str_split($s1);
    $arr2 = str_split($s2);
    $len1 = count($arr1);
    $len2 = count($arr2);
    $left = array($len2 + 1);
    $right = array($len2 + 1);
    for($i=0; $i<=$len2; $i++){
        $left[$i] = 0;
    }
    for ($m=1; $m<=$len1; $m++){
        $right[0] = 0;
        for ($n=1; $n<=$len2; $n++){
            if ($arr1[$m-1] == $arr2[$n-1]){
                $right[$n] = $left[$n-1] + 1;
            }else{
                $right[$n] = $left[$n] > $right[$n-1] ? $left[$n] : $right[$n-1];
            }
        }
        $left = $right;
        $right = array($len2 + 1);
    }
    echo $left[$n-1];
}
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
$s1 = trim(fgets($_fp));
$s2 = trim(fgets($_fp));
commonChild($s1, $s2);
fclose($_fp);
?>