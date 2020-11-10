<?php


/**
 * 从一个不重复的数组中查找两数之和为指定数值的数对
 */


$arr = [5, 2, 6, 8, 4, 10, 1, 9, 3, 7];


function getNumsKv($arr, $nums)
{
    $result = [];
    $arr = array_flip($arr);
    foreach ($arr as $v => $index) {
        if (isset($arr[$nums - $v])) {
            $result[] = [$nums - $v, $v];
        }
    }
    return $result;
}

var_dump(getNumsKv($arr, 12));
