<?php

class ShoppingCart implements iterator {
    private $songID = array(
        [quantity] => $items
    );
    
    public function __construct($songID) {
        $this->songID = $songID;
    }
    
    public addToCart () {
        array_push($songID, $songID, $quantity);
    }
    
    public function rewind() {
        reset($this->items);
    }
    
    public function current() {
        $songID = current($this->items);
        return $songID;
    }
    
    public function key() {
        $songID = key($this->items);
        return $songID;
    }
    
    public function next() {
        $songID = next($this->items);
        return $songID;
    }
    
    public function valid() {
        $songID = key($this->items);
        $songID = ($songID !== NULL && $songID !== FALSE);
        return $songID;
    }
}

?>