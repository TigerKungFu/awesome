<?php
/**
 * Queue.
 * User: zhouxiuhu
 * Date: 12/6/15
 * Time: 1:56 AM
 * Description: First In First Out, actually, array can be Queue in php
 */
class QueueItem{
    public $data = null;
    public $next = null;
    public $prev = null;

    public function __construct($data){
        $this->data = $data;
    }
}

class Queue{
    protected $_head = null;
    protected $_tail = null;

    public function insert($data){
        $item = new QueueItem($data);

        if ($this->_head == null){
            $this->_head = $item;
            $this->_tail = $item;
        }else{
            $this->_head->prev = $item;
            $item->next = $this->_head;
            $this->_head = $item;
        }
    }
    public function delete(){
        if ($this->_tail != null){
            $item = $this->_tail;
            $this->_tail = $this->_tail->prev;
            $data = $item->data;
            $item = null;
            if ($this->_tail == null){
                $this->_head = null;
            }else{
                $this->_tail->next = null;
            }
            return $data;
        }
        return false;
    }
    public function __toString(){
        $output = "";
        $item = $this->_head;
        while($item){
            $output .= $item->data . "  ";
            $item = $item->next;
        }
        return $output . "\n";
    }
}