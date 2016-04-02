<?php
/**
 * Normal Tree.
 * User: zhouxiuhu
 * Date: 12/9/15
 * Time: 10:57 AM
 * Description: Each child has a key & value
 */
class TreeNode{
    public $key = null;
    public $parent = null;
    public $data = null;
    public $children = array();

    public function __construct($key, $data){
        $this->key = $key;
        $this->data = $data;
    }
    public function addChildren(&$node){
        $node->parent = $this;
        $this->children[] = $node;
    }
    public function __toString(){
        return "[ " . $this->key . " : " . $this->data . "]";
    }
}
class Tree{
    protected $_root = null;

    public function __construct(&$node){
        $this->_root = $node;
    }
    public function _searchByKey($key, $root){
        if ($root == null){
            return false;
        }
        if ($root->key == $key){
            return $root;
        }
        foreach ($root->children as $child){
            $res = $this->_searchByKey($key, $child);
            if ($res){
                return $res;
            }
        }
        return false;
    }
    public function searchByKey($key){
        return $this->_searchByKey($key, $this->_root);
    }

    /**
     * 前提是key必须是唯一的
     * @param $key
     * @param $root
     * @param $path
     * @return bool
     */
    public function _findPath($key, $root, &$path){
        if ($root == null){
            return false;
        }
        array_push($path, $root->key);
        if ($root->key == $key) {
            return true;
        }else{
            foreach($root->children as $child){
                if ($this->_findPath($key, $child, $path)){
                    return true;
                }else{
                    array_pop($path);
                }
            }
        }
    }

    /**
     * @param $key
     * @param $path 引用参数，加&
     */
    public function findPath($key, &$path){
        $this->_findPath($key, $this->_root, $path);
    }

    /**
     * 先根遍历普通树
     * @param $root
     * @return string
     */
    public function _rootFirst($root){
        if ($root == null){
            return '';
        }
        $output = "";
        foreach ($root->children as $child){
            $output .= $this->_rootFirst($child) . " | ";
        }

        return $root . " Child{ \n" . $output . "\n}";
    }
    /**
     * 查找最近祖先
     * 先计算两个节点的路径，根据路径来查找
     */
    public function findCommonAncestor($node1, $node2){
        $common = null;
        $path1 = array();
        $path2 = array();
        $this->findPath($node1->key, $path1);
        $this->findPath($node2->key, $path2);
        $c1 = count($path1);
        $c2 = count($path2);
        $len = $c1 > $c2 ? $c2 : $c1;
        for($i = 0; $i < $len; $i++){
            if ($path1[$i] == $path2[$i]){
                $common = $path1[$i];
            }else{
                break;
            }
        }
        return $common;
    }

    public function __toString(){
        return $this->_rootFirst($this->_root) . "\n";
    }
}