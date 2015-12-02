<?php
/**
 * LinkedList
 * User: zhouxiuhu
 * Date: 12/3/15
 * Time: 12:43 AM
 */
class Item{
    private $_key = '';
    private $_next = null;

    public function __construct($key){
        $this->_key = $key;
    }

    public function setNext(&$next){
        $this->_next = $next;
    }
    public function &getNext(){
        return $this->_next;
    }
    public function setKey($key){
        $this->_key = $key;
    }
    public function getKey(){
        return $this->_key;
    }

    public function __toString(){
        return $this->_key . "\n";
    }
}

class LinkedList{
    private $_head = null;
    private $_tail = null;

    public function insert(&$item){
        if ($this->_head == null){
            $this->_head = $item;
            $this->_tail = $item;
        }else{
            $this->_tail->setNext(&$item);
            $this->_tail = &$item;
        }
    }

    public function __toString(){
        $current = $this->_head;
        $output = '';

        while($current){
            $output .= $current;
            $current = $current->getNext();
        }
        return $output;
    }
}
?>