<?php


class Node
{

    public $value;
    public $left = null;
    public $right = null;

    public function __construct($value = 0)
    {
        $this->value = $value;
    }
}

/**
 * 二叉排序树
 * Class binarySortTree
 */
class binarySortTree
{

    public $root;

    public function __construct($int)
    {
        $this->root = new Node($int);
    }


    public function addNode($int = 5)
    {
        if ($this->root == null) {
            $this->root = new Node($int);
            return;
        }
        if ($this->root->value == null) {
            $this->root->value = $int;
        }

        if ($this->root->value > $int) {
            $currentNode = $this->root->left;
            return $this->addNode($currentNode, $int);
        } else {
            $currentNode = $this->root->right;
            return $this->addNode($currentNode, $int);
        }
    }


    public function nodeList()
    {
        $root = $this->root;
        if ($root->left == null) {
            var_dump($root->value);
            echo "<br/>";
        } else {

        }
    }


}
