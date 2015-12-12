<?php
/**
 * Binary Search Tree, left < root < right.
 * User: zhouxiuhu
 * Date: 12/6/15
 * Time: 2:50 PM
 */
require_once __DIR__ . "/../DataStructure/Queue.php";

class BinaryNode{
    public $parent = null;
    public $left = null;
    public $right = null;
    public $data = null;

    public function __construct($data){
        $this->data = $data;
    }
    public function __toString(){
        return $this->data . "";
    }
}

class BinaryTree{
    protected $_root = null;

    protected function _insert(&$new, &$root){
        if ($root == null){
            $root = $new;
            return;
        }
        // insert to right tree
        if ($new->data > $root->data){
            if ($root->right == null){
                $root->right = $new;
            }else{
                $this->_insert($new, $root->right);
            }
        }else{ // insert to left tree
            if ($root->left == null){
                $root->left = $new;
            }else{
                $this->_insert($new, $root->left);
            }
        }
    }
    protected function _search($target, &$root){
        if ($target == $root){
            return 1;
        }
        if($target->data > $root->data && $root->right != null){
            // search right tree
            return $this->_search($target, $root->right);
        }else if($target->data <= $root->data && $root->left != null){
            return $this->_search($target, $root->left);
        }
        return 0;
    }
    // insert to right tree
    public function insert($new){
        $this->_insert($new, $this->_root);
    }
    public function search($target){
        return $this->_search($target, $this->_root);
    }

    public function __toString(){
        $output = "";
        $q = new Queue();
        $q->insert($this->_root);
        $t = $q->delete();
        while($t != false){
            $output .= $t . " ";
            if ($t->left != null){
                $q->insert($t->left);
            }
            if ($t->right != null){
                $q->insert($t->right);
            }
            $t = $q->delete();
        }
        return $output . "\n";
    }
}