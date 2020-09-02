<?php
/**
 * Created by PhpStorm.
 * User: hough
 * Date: 2020/4/27
 * Time: 16:45
 */

include_once "./LinkedList.php";

/**
 * 1. 链表创建，添加元素，遍历
 */
// 初始化一个单链表
$linkListOne = new linkList();
// 为单链表添加节点
$linkListOne->addLink(new Node(4));
$linkListOne->addLink(new Node(8));
$linkListOne->addLink(new Node(1));
$linkListOne->addLink(new Node(7));
$linkListOne->addLink(new Node(6));
// 打印单链表
$linkListOne->getLinkList();


echo PHP_EOL;

/**
 * 2. 实现链表的逆序
 */
$linkList = new linkList();
// 为单链表添加节点
$linkList->addLink(new Node(1));
$linkList->addLink(new Node(2));
$linkList->addLink(new Node(3));
$linkList->addLink(new Node(4));
$linkList->addLink(new Node(5));
$linkList->addLink(new Node(6));
$linkList->addLink(new Node(7));
// 打印单链表
$linkList->getLinkList();
$linkList->reverse();
echo PHP_EOL;
$linkList->getLinkList();