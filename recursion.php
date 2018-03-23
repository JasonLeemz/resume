<?php
/**
 * Created by PhpStorm.
 * User: 李明泽
 * Date: 2018/1/30
 * Time: 17:18
 */
//一个多维数组，请写一个递归函数输出所有内容并返回数组内元素的总个数

$arr = [
    'a' => [
        1, 2, 3, 4, 5
    ],
    'b' => 'o',
    'c',
    'd' => [
        'f' => 'g',
        'k',
        'q'
    ],
    'e',
    3
];

function tongji($arr, &$count)
{
    //遍历第一层
    foreach ($arr as $value) {
        //如果发现$value还是一个数组，则递归
        if (is_array($value)) {
            tongji($value, $count);
        } else {
            //else 计数器+1
            $count++;
        }
    }
    return $count;
}

$count = 0;
echo tongji($arr, $count);
