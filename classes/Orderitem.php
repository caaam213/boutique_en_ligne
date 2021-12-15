<?php
class OrderItem
{
    private $_id;
    private $_order_id;
    private $_product_id;
    private $_quantity;

    function __construct($id, $order_id, $product_id,$quantity)
    {
        $this->_id = $id;
        $this->_order_id = $order_id;
        $this->_product_id = $product_id;
        $this->_quantity = $quantity;
    }
    
    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Get the value of _order_id
     */ 
    public function get_order_id()
    {
        return $this->_order_id;
    }

    /**
     * Get the value of _product_id
     */ 
    public function get_product_id()
    {
        return $this->_product_id;
    }

    /**
     * Get the value of _quantity
     */ 
    public function get_quantity()
    {
        return $this->_quantity;
    }
}








?>