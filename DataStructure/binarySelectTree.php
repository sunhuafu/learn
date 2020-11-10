<?php

/**
 * Created by PhpStorm.
 * User: baimayou
 * Date: 19-3-20
 * Time: 下午6.00
 * 二叉查找树
 * 二叉查找树要求，在树中的任意一个节点，其左子树中的每个节点的值，都要小于这个节点的值，而右子树节点的值都大于这个节点的值
 */
//定义二叉树的节点
class Node{
    public $left = null;
    public $right = null;
    public $data = '';
    public function __construct($data){
        $this->data = $data;
    }

}
//二叉查找树的添加
function buildSearchTree($tree,$value){
    if($tree == null){
        $tree = new Node($value);
    }
    $newNode = new Node($value);
    while($tree != null){
        if($tree->data > $value){
            if($tree->left == null){
                $tree->left = $newNode;
                return;
            }
            $tree = $tree->left;
        }else{
            if($tree->right == null){
                $tree->right =$newNode;
                return;
            }
            $tree = $tree->right;
        }
    }
}
//二叉查找树的删除
/**
 * 第一种情况是，如果要删除的节点没有子节点，我们只需要直接将父节点中，指向要删除节点的指针置为 null。
 * 第二种情况是，如果要删除的节点只有一个子节点（只有左子节点或者右子节点），我们只需要更新父节点中，指向要删除节点的指针，
 *      让它指向要删除节点的子节点就可以了
 * 第三种情况是，如果要删除的节点有两个子节点，这就比较复杂了。
 *      我们需要找到这个节点的右子树中的最小节点，把它替换到要删除的节点上。然后再删除掉这个最小节点，
 *      因为最小节点肯定没有左子节点（如果有左子结点，那就不是最小节点了）
 *
 * 注意：注意指针的位置 和 树的结构，对象的赋值，值地址的赋值，也会改变对象
 **/
//找到该节点并删除
function deleteBst(&$tree,$value){
    if(is_null($tree)){
        return false;
    }
    if($tree->data == $value){
        return delete($tree);
    }elseif ($tree->data < $value){
        deleteBst($tree->right,$value);
    }else{
        deleteBst($tree->left,$value);
    }
}
//调整删除后树的形态
function delete(&$biTree) {
    if ($biTree->left === null) {   //删除的节点有唯一右子树
        $biTree = $biTree->right;
    } else if ($biTree->right === null) { //删除的节点有唯一左子树
        $biTree = $biTree->left;
    } else {    //删除的节点有左右子树
        //找到要删除的节点左子树的最右节点然后删除 （或者右子树的最左节点）
        $parNode = $biTree;
        $delNode = $biTree->left;
        while (!is_null($delNode->right)) {
            $parNode = $delNode;
            $delNode = $delNode->right;
        }
        $biTree->data = $delNode->data;
//        if ($biTree == $parNode) {
//            $parNode->left = $delNode->left;
//        } else {
//            $parNode->right = $delNode->left;
//        }
    }
}
function preOrder($tree){
    if($tree != null){
        echo $tree->data;
        preOrder($tree->left);
        preOrder($tree->right);
    }
}
$a = new Node('3');
buildSearchTree($a,'6');
buildSearchTree($a,'2');
buildSearchTree($a,'1');
buildSearchTree($a,'5');
buildSearchTree($a,'4');
buildSearchTree($a,'7');
buildSearchTree($a,'8');
buildSearchTree($a,'9');
preOrder($a);
deleteBst($a,8);
echo "<br>";
preOrder($a);
