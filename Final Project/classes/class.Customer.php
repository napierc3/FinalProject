<?php

class Customer {
    private $customerID;
    private $customerName;
    private $database;
    
    public function __construct($customerID, $database) {
        $this->customerID = $customerID;
        $this->database = $database;
    }
    
    function getCustomerID() {
        return $this->customerID;
    }
    
    function getCustomerName() {
        return $this->customerName;
    }
    
    function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }
    
    function setDatabase($database) {
        $this->database = $database;
    }
}

?>