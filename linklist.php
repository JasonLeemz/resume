<?php

/**
 * Created by PhpStorm.
 * User: 李明泽
 * Date: 2018/2/2
 * Time: 15:24
 */
interface linkList
{

    //push方法 尾部添加
    public function push($data);

    //remove方法
    public function remove($index);

    //update方法
    public function update($index, $data);

    //头插
    public function unshift($data);

    //头部删除一个元素
    public function shift();

    //尾部删除一个元素
    public function pop();
}

class node
{

    public $data;
    public $next;
}

class singleLinkList implements linkList
{

    public $head;
    private $tail;
    public $length;

    public function __construct()
    {

        //初始化头结点
        $this->head = new node();
        $this->head->data = null;
        $this->head->next = null;

        //尾部与头部重合
        $this->tail = &$this->head;
        $this->length = 0;
    }


    //push方法 尾部添加
    public function push($data)
    {
        //实例化新节点并赋给next
        $node = new node();
        $node->data = $data;
        $node->next = null;

        $this->tail->next = $node;

        //尾指针后移
        $this->tail = &$this->tail->next;
        //链表长度+1
        $this->length++;
    }

    public function unshift($data)
    {
        // TODO: Implement unshift() method.

        $node = new node();
        $node->data = $data;
        $node->next = &$this->head->next;

        $this->head->next = &$node;

        $this->length++;
    }

    public function shift()
    {
        // TODO: Implement shift() method.

        if ($this->length === 0) {
            return null;
        } elseif ($this->length > 1) {
            $this->head->next = &$this->head->next->next;
        } else {
            $this->head->next = null;
            $this->tail = &$this->head;
        }

        $this->length--;
    }

    public function pop()
    {
        // TODO: Implement pop() method.

        if ($this->length === 0) {
            return null;
        } else {
            $this->tail = null;

            //重置尾指针
            $this->tail = &$this->head;
            while ($this->tail->next !== null) {
                $this->tail = &$this->tail->next;
            }
        }
        $this->length--;
    }

    public function remove($index)
    {
        if ($this->length === 0) {
            return null;
        }

        $node = &$this->head->next;

        $count = 0;
        while ($count < $this->length) {
            $count++;
            if ($count === $index) {
                if ($node->next->next !== null) {
                    $node->next = &$node->next->next;
                } else {
                    $node->next = null;
                }
            }
        }

        $this->length--;
    }

    public function update($index, $data)
    {
        $node = &$this->head->next;
        $count = 0;
        while ($node !== null) {
            $count++;

            if ($count === $index) {
                $node->data = $data;
                break;
            }
            $node = &$node->next;
        }
    }

    public function reverse()
    {
        unset($this->tail);

        $head1 = $this->head->next;
        $head2 = $this->head->next->next;
        $head1->next = null;

        $this->tail = &$head1;

        while ($head2->next !== null) {

            $node = new node();
            $node->data = $head2->data;
            $node->next = $head1;

            $head1 = $node;
            $head2 = $head2->next;

        }
//
        $head2->next = $head1;
        $this->head = $head2;

//        $this->head = &$head1;


    }
}

$list = new singleLinkList();
$list->push("1");
$list->push("2");
$list->push("3");
$list->push("4");
$list->push("5");
$list->push("6");
$list->push("7");
$list->push("8");
$list->push("9");
//$list->push("5");
//$list->push("5");
$list->reverse();

//$list->unshift("3");
//$list->shift();
//$list->pop();
//
//$list->update(1, 10);

var_dump($list);