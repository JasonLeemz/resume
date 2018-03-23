<?php

/**
 * Created by PhpStorm.
 * User: 李明泽
 * Date: 2018/2/6
 * Time: 18:30
 */
class QuickSort
{
    public function sort(&$arr, $left, $right)
    {
        $tmpLeft = $left;
        $tmpRight = $right;

        if ($left >= $right) {
            return;
        }
        //循环直到left!=right
        while ($left < $right) {
            //从后往前找，直到小于$left
            while ($right > $left) {
                if ($arr[$right] < $arr[$left]) {
                    //交换
                    $t = $arr[$right];
                    $arr[$right] = $arr[$left];
                    $arr[$left] = $t;

                    //左指针右移
                    $left++;
                    break;
                }
                $right--;
            }

            //从前往后找，直到大于$left
            while ($left < $right) {
                if ($arr[$right] < $arr[$left]) {
                    //交换
                    $t = $arr[$left];
                    $arr[$left] = $arr[$right];
                    $arr[$right] = $t;

                    //右指针左移
                    $right--;
                    break;
                }
                $left++;
            }
        }

        //递归调用

        //左边
        $this->sort($arr, $tmpLeft, $right - 1);

        //右边
        $this->sort($arr, $right + 1, $tmpRight);

    }
}


//$arr = [5, 6, 3, 9, 0, 1, 7];
//$arr = [2, 0, 1, 8, 2, 6];
//$obj = new QuickSort();
//$obj->sort($arr, 0, 5);
//
//var_dump($arr);

