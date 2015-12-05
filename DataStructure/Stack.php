<?php
/**
 * Stack
 * User: zhouxiuhu
 * Date: 12/6/15
 * Time: 12:56 AM
 */
class Item{
    protected $_date = null;
    protected $_next = null;

    public function __construct($data, $next){
        $this->_date = $data;
        $this->_next = $next;
    }

    public function setNext($next){
        $this->_next = $next;
    }
    public function getNext(){
        return $this->_next;
    }
    public function setData($data){
        $this->_date = $data;
    }
    public function getData($data){
        return $this->_date;
    }
}

class Stack{
    protected $_top = null;

    public function push($data){
        $item = new Item($data, null);
        if ($this->_top == null){
            $this->_top = $item;
        }else{
            $item->setNext($this->_top);
            $this->_top = $item;
        }
    }
    public function pop(){
        if ($this->_top) {
            $item = $this->_top;
            $data = $item->getData();
            $this->_top = $this->_top->getNext();
            $item = null;
            return $data;
        }
    }
    public function top(){
        if ($this->_top){
            return $this->_top->getData();
        }
    }

    public function __toString(){
        $output = "";
        $item = $this->_top;
        while($item){
            $output .= $item->getData() . " ";
            $item = $item->getNext();
        }
        return $output;
    }
}
?>