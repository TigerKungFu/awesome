<?php
/**
 * Balance Binary Search Tree.
 * User: zhouxiuhu
 * Date: 12/7/15
 * Time: 12:12 AM
 */
class BalanceBinaryNode{
    public $parent = null;
    public $left = null;
    public $right = null;
    public $key = null;
    public $data = null;

    public function __construct($key, $data){
        $this->key = $key;
        $this->data = $data;
    }

    public function setEmpty(){
        $this->data = null;
    }

    public function __toString(){
        $output = "[key: " . $this->key . " data: ";
        if ($this->data && is_array($this->data)){
            foreach ($this->data as $key=>$value) {
                $output .= $key . " : " . $value . "    ";
            }
        }
        $output .= "] ";
        return $output;
    }
}

class BalanceBinaryTree{
    protected $_root = null;

    public function _insert($new, &$root){
        if ($root == null){
            $root = $new;
            return;
        }
        if ($new->key > $root->key){
            if ($root->right == null){
                $root->right = $new;
                $new->parent = $root;
            }else{
                $this->_insert($new, $root->right);
            }
        }else{
            if ($root->left == null){
                $root->left = $new;
                $new->parent = $root;
            }else{
                $this->_insert($new, $root->left);
            }
        }
    }
    public function insert($new){
        $this->_insert($new, $this->_root);
    }

    /**
     * search by value
     * @param $dataKey
     * @param $dataValue
     * @param $root
     * @return bool|string
     */
    public function _search($dataKey, $dataValue, $root){
        if ($root == NULL){
            return false;
        }
        if (isset($root->data[$dataKey]) && $root->data[$dataKey] == $dataValue){
            return $root;
        }
        return $this->_search($dataKey, $dataValue, $root->left) . $this->_search($dataKey, $dataValue, $root->right);
    }
    public function search($dataKey, $dataValue){
        return $this->_search($dataKey, $dataValue, $this->_root);
    }

    /**
     * 利用二叉树的特性，查找元素
     * @param $key
     * @param $root
     * @return bool
     */
    public function _searchByKey($key, $root){
        if ($root == NULL){
            return false;
        }
        if ($key == $root->key){
            return $root;
        }else if ($key < $root->key){
            return $this->_searchByKey($key, $root->left);
        }else if ($key > $root->key){
            return $this->_searchByKey($key, $root->right);
        }
    }
    public function searchByKey($key){
        return $this->_searchByKey($key, $this->_root);
    }

    /**
     * 二叉树按照Key排序，生成array
     * @param $root
     * @return array
     */
    public function _sort($root){
        if ($root == NULL){
            return array();
        }
        return array_merge($this->_sort($root->left), array(array("key"=>$root->key, "data"=>$root->data)),
            $this->_sort($root->right));
    }
    public function _balance($list){
        if (empty($list)){
            return;
        }
        $chunks = array_chunk($list, ceil(count($list)/2));
        $mid = array_pop($chunks[0]);

        $node = new BalanceBinaryNode($mid["key"], $mid["data"]);
        $this->insert($node);

        $this->_balance($chunks[0]);
        if (isset($chunks[1])){
            $this->_balance($chunks[1]);
        }
    }
    public function balance(){
        $list = array();
        $list = $this->_sort($this->_root);
        $this->_root = null;
        $this->_balance($list);
    }

    /**
     * 中根遍历，二叉树的key按照升序排列
     * @param $root
     */
    public function _leftRootRight($root, $level){
        if ($root == null){
            return '';
        }
        return $this->_leftRootRight($root->left, $level + 1) . " " . $root . "($level) " .
            $this->_leftRootRight($root->right, $level + 1);
    }
    /**
     * 先根遍历
     * @param $root
     * @return string
     */
    public function _rootLeftRight($root, $level){
        if ($root == null){
            return '';
        }
        return $root . "($level) " . $this->_rootLeftRight($root->left, $level + 1) . " " .
            $this->_rootLeftRight($root->right, $level + 1);
    }

    /**
     * 后根遍历
     * @param $root
     * @return string
     */
    public function _leftRightRoot($root, $level){
        if ($root == null){
            return '';
        }
        return $this->_leftRightRoot($root->left, $level + 1) . " " . $this->_leftRightRoot($root->right, $level + 1) .
            " " . $root . "($level) ";
    }

    /**
     * 查找第一个共同祖先
     * @param $node1
     * @param $node2
     * @param $root
     * @return bool
     */
    public function _findCommonAncestor($node1, $node2, $root){
        if ($root == null){
            return false;
        }

        if ($node2->key < $root->key){ //left of root
            return $this->_findCommonAncestor($node1, $node2, $root->left);
        }else if ($node1->key > $root->key){ //right of root
            return $this->_findCommonAncestor($node1, $node2, $root->right);
        }else {
            return $root;
        }
    }
    public function findCommonAncestor($node1, $node2){
        if ($node1 == null || $node2 == null){
            return false;
        }
        if ($node1->key > $node2->key){
            $tmp = $node1;
            $node1 = $node2;
            $node2 = $tmp;
        }
        return $this->_findCommonAncestor($node1, $node2, $this->_root);
    }
    public function __toString(){
        return "Left Root Right: " . $this->_leftRootRight($this->_root, 1) . "\n" .
            "Root Left Right: " . $this->_rootLeftRight($this->_root, 1) . "\n" .
            "Left Right Root: " . $this->_leftRightRoot($this->_root, 1) . "\n";
    }
}