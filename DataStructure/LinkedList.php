<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/27
 * Time: 16:02
 */


/**
 * Class Node
 * 节点数据结构
 */
class Node
{
    public $data;
    public $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = Null;
    }
}

// 单链表
class linkList
{
    private $header;

    // 构造方法
    public function  __construct($data = Null)
    {
        $this->header = new Node($data);
    }

    // 添加节点数据
    public function addLink(Node $node)
    {
        $current = $this->header;
        while ($current->next != Null) {
            // 如果不是最后一个节点，则将下一个节点当做当前节点
            $current = $current->next;
        }
        $node->next = $current->next; // 将当前的下一个节点赋值给要添加的节点的下一个节点。
        $current->next = $node; // 将当前节点指向要添加的节点。
    }

    // 清空链表
    public function clear()
    {
        $this->header = Null;
    }

    // 获取链表
    public function getLinkList()
    {
        $current = $this->header;
        if ($current->next == Null) {
            echo("链表为空");
            return;
        }
        while ($current->next != Null) {
            echo $current->next->data . " ";
            if ($current->next->next == Null) {
                break;
            }
            $current = $current->next; // 当前节点的切换
        }
    }

    // 单链表倒序
    public function reverse()
    {
        $head = $this->header;
        if ($head->next == Null || $head->next->next == Null) {
            echo "为空链表或者只有一个节点！";
        }
        // 从第二个节点开始
        $current = Null;
        $next = Null;
        $current = $head->next->next;
        $head->next->next = Null;
        while ($current != Null) {
            $next = $current->next;
            $current->next = $head->next;
            $head->next = $current;
            $current = $next;
        }
    }

}


