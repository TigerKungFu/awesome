<?php
/**
 * https://www.hackerrank.com/challenges/larrys-array
 * Larry has a permutation of N numbers, A , whose unique elements range from 1 to N (i.e.: A={a1,a2...an}). He wants A to be sorted,
 * so he delegates the task of doing so to his robot. The robot can perform the following operation as many times as it wants:
 *
 * Choose any 3 consecutive indices and rotate their elements in such a way that ABC rotates to CAB, which rotates to BCA, which rotates back to ABC.
 * For example: if A={1 6 5 2 4 3} and the robot rotates (6 5 2) , A becomes {1 5 2 6 4 3}.
 *
 * On a new line for each test case, print YES if the robot can fully sort A; otherwise, print NO.
 *
 * Input Format
 *
 * The first line contains an integer, T, the number of test cases.
 * The 2T subsequent lines each describe a test case over 2 lines:
 *
 * An integer, N, denoting the size of A.
 * N space-separated integers describing A, where the ai value describes element .
 * Constraints
 * 1 < T < 10
 * 3 <= N <= 1000
 * 1 <= ai <= N, each ai is unique
 * Output Format
 *
 * On a new line for each test case, print YES if the robot can fully sort A; otherwise, print NO.
 *
 * Sample Input
 *
 * 3
 * 3
 * 3 1 2
 * 4
 * 1 3 4 2
 * 5
 * 1 2 3 5 4
 * Sample Output
 *
 * YES
 * YES
 * NO
 * Explanation
 *
 * In the explanation below, the subscript of  denotes the number of operations performed.
 *
 * Test Case 0:
 * is now sorted, so we print  on a new line.
 *
 * Test Case 1:
 * is now sorted, so we print  on a new line.
 *
 * Test Case 2:
 * No sequence of rotations will result in a sorted . Thus, we print  on a new line.
 * User: zhouxiuhu
 * Date: 5/21/16
 * Time: 11:46 PM
 */
function likePuzzle(){
    $_fp = fopen("php://stdin", "r");
    /* Enter your code here. Read input from STDIN. Print output to STDOUT */
    fscanf($_fp, "%d", $T);
    $result = array();
    for ($i=0; $i<$T; $i++){
        fscanf($_fp, "%d", $N);
        $list = explode(" ", rtrim(fgets($_fp)));
        $inversion = 0;
        for ($j=0; $j<$N; $j++){
            for ($m=$j+1; $m<$N; $m++){
                if ($list[$m] < $list[$j]){
                    $inversion++;
                }
            }
        }
        if ($inversion % 2 == 0){
            array_push($result, "YES");
        }else{
            array_push($result, "NO");
        }
    }
    echo implode("\n", $result);
    fclose($_fp);
}
likePuzzle();
?>