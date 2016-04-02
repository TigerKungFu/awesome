<?php
/**
 * Given an array with nn elements, can you sort this array in ascending order using only one of the following
 * operations?
 *
 * Swap two elements.
 * Reverse one sub-segment.
 * Input Format
 * The first line contains a single integer, nn, which indicates the size of the array.
 * The next line contains nn integers separated by spaces.
 *
 * n
 * d1 d2 ... dn
 * Constraints
 * 2≤n≤1000002≤n≤100000
 * 0≤d0≤dii ≤1000000≤1000000
 * All ddii are distinct.
 *
 * Output Format
 * 1. If the array is already sorted, output yes on the first line. You do not need to output anything else.
 *
 * If you can sort this array using one single operation (from the two permitted operations) then output yes on the
 * first line and then:
 *
 * a. If you can sort the array by swapping ddll and ddrr, output swap l r in the second line. ll and rr are the
 * indices of the elements to be swapped, assuming that the array is indexed from 11 to nn.
 *
 * b. Else if it is possible to sort the array by reversing the segment d[l...r]d[l...r], output reverse l r in the
 * second line. ll and rr are the indices of the first and last elements of the subsequence to be reversed, assuming
 * that the array is indexed from 11 to nn.
 *
 * d[l...r]d[l...r] represents the sub-sequence of the array, beginning at index ll and ending at index rr, both
 * inclusive.
 *
 * If an array can be sorted by either swapping or reversing, stick to the swap-based method.
 *
 * If you cannot sort the array in either of the above ways, output no in the first line.
 *
 * Sample Input #1
 *
 * 2
 * 4 2
 * Sample Output #1
 *
 * yes
 * swap 1 2
 * Sample Input #2
 *
 * 3
 * 3 1 2
 * Sample Output #2
 *
 * no
 * Sample Input #3
 *
 * 6
 * 1 5 4 3 2 6
 * Sample Output #3
 *
 * yes
 * reverse 2 5
 * Explanation
 * For #1, you can both swap(1, 2) and reverse(1, 2), but if you can sort the array using swap, output swap only.
 * For #2, it is impossible to sort by one single operation (among those permitted).
 * For #3, you can reverse the sub-array d[2...5] = "5 4 3 2", then the array becomes sorted.
 * User: zhouxiuhu
 * Date: 3/20/16
 * Time: 12:59 AM
 */

function checkIt($list, $len, $type, $start, $end){
    $rstart = $start + 1;
    $rend = $end + 1;
    //echo $start."aaa".$end;
    if ($type==1){//swap
        $temp = $list[$start];
        $list[$start] = $list[$end];
        $list[$end] = $temp;
    }else{//reverse
        for ($i=$start, $j=$end; $i<$j; $i++, $j--){
            if ($j==$end && $list[$j]>$list[$j-1]){
                $j--;
                $rend--;
            }
            $temp = $list[$i];
            $list[$i] = $list[$j];
            $list[$j] = $temp;
        }
    }
    for($i=0; $i<$len-1; $i++){
        if ($list[$i]>$list[$i+1]){
            return false;
        }
    }
    return $rstart . " " . $rend;
}
function findIt($list, $len){
    $start = -1;
    $end = -1;
    for ($i=1; $i<$len; $i++){
        if ($list[$i-1]<$list[$i]){
            if ($start != -1){
                if ($list[$i] > $list[$start]){
                    $end = $i-1;
                    break;
                }else if($i == $len-1){
                    $end = $i;
                    break;
                }
            }
            continue;
        }else{//distinct
            if ($i == $len -1){
                $end = $i;
            }
            if ($start == -1){
                $start = $i-1;
            }
        }
    }
    if ($start == -1){
        echo "yes";
    }else{
        if ($info = checkIt($list, $len, 1, $start, $end)){
            echo "yes\n";
            echo "swap $info";
        }else if ($info = checkIt($list, $len, 2, $start, $end)){
            echo "yes\n";
            echo "reverse $info";
        }else{
            echo "no";
        }
    }
}
$_fp = fopen("php://stdin", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */
fscanf($_fp, "%d", $len);
$str = rtrim(fgets($_fp));
$list = explode(" ", $str);
findIt($list, $len);
fclose($_fp);
?>