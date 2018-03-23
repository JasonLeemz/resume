<?php

/**
 * Created by PhpStorm.
 * User: 李明泽
 * Date: 2018/2/6
 * Time: 18:59
 */

require_once 'QuickSort.php';

class BinarySearch
{
    public $arr;
    public $value;

    public function __construct($arr, $value)
    {
        $this->arr = $arr;
        $this->value = $value;
    }

    public function search($left, $right)
    {
        if ($left >= $right) {
            return 'null';
        }

        $middle = floor(($right - $left) / 2) + $left;
        echo " . ";
        if ($this->arr[$middle] > $this->value) {
            return $this->search($left, $middle);
        } elseif ($this->arr[$middle] < $this->value) {
            return $this->search($middle, $right);
        } else {
            return $middle;
        }
    }
}

//$arr = [2, 0, 1, 8, 2, 6];
$arr = [5, 6, 3, 9, 0, 1, 7];
$sortObj = new QuickSort();
$sortObj->sort($arr, 0, 6);
//
//var_dump($arr);
//array(6) {
//    [0]=>
//  int(0)
//  [1]=>
//  int(1)
//  [2]=>
//  int(2)
//  [3]=>
//  int(2)
//  [4]=>
//  int(6)
//  [5]=>
//  int(8)
//}


$obj = new BinarySearch($arr, 1);
echo $obj->search(0, 6);