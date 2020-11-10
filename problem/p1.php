<?php

/**
 * 已知 A-1 B-2 ... Z-26 AA-17 AB-28 ... AZ-52  给定一个数，得到其表示的字符？
 */


$arr = [
    'A' => 1, 'B' => 2, 'C' => 3, 'D' => 4, 'E' => 5, 'F' => 6, 'G' => 7,
    'H' => 8, 'I' => 9, 'J' => 10, 'K' => 11, 'L' => 12, 'M' => 13, 'N' => 14,
    'O' => 15, 'P' => 16, 'Q' => 17, 'R' => 18, 'S' => 19, 'T' => 20, 'U' => 21,
    'V' => 22, 'W' => 23, 'X' => 24, 'Y' => 25, 'Z' => 26
];

const MAX_CHAR = 26;


function numTransformChar($arr, $int)
{
    $nArr = array_flip($arr);
    if ($int < MAX_CHAR) {
        echo $nArr[$int];
        return;
    }
    $mod = $int % MAX_CHAR;
    if ($mod == 0) {
        $res = $nArr[$int / MAX_CHAR];
        if ($res >= MAX_CHAR) {
            numTransformChar($arr, $res);
        }
    } else {

    }

    echo $nArr[$mod];
}

numTransformChar($arr, 19875432);