<?php
class Order
{
    private $_id;
    private $_customer_id;
    private $_registered;
    private $_delivery_add_id;
    private $_payment_type;
    private $_date;
    private $_status;
    private $_session;
    private $_total;

    public function __construct($id,$customer_id,$registered,$delivery_add_id,$payment_type,$date,$status,$session, $total)
    {
        $this->_id = $id;
        $this->_customer_id = $customer_id;
        $this->_registered = $registered;
        $this->_delivery_add_id = $delivery_add_id;
        $this->_payment_type = $payment_type;
        $this->_date = $date;
        $this->_status = $status;
        $this->_session = $session;
        $this->_total = $total;
    }

    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Get the value of _customer_id
     */ 
    public function get_customer_id()
    {
        return $this->_customer_id;
    }

    /**
     * Get the value of _registered
     */ 
    public function get_registered()
    {
        return $this->_registered;
    }

    /**
     * Set the value of _registered
     *
     * @return  self
     */ 
    public function set_registered($_registered)
    {
        $this->_registered = $_registered;

        return $this;
    }

    /**
     * Get the value of _delivery_add_id
     */ 
    public function get_delivery_add_id()
    {
        return $this->_delivery_add_id;
    }

    /**
     * Get the value of _payment_type
     */ 
    public function get_payment_type()
    {
        return $this->_payment_type;
    }

    /**
     * Set the value of _payment_type
     *
     * @return  self
     */ 
    public function set_payment_type($_payment_type)
    {
        $this->_payment_type = $_payment_type;

        return $this;
    }

    /**
     * Get the value of _date
     */ 
    public function get_date()
    {
        return $this->_date;
    }

    public function get_status()
    {
        return $this->_status;
    }

    public function get_session()
    {
        return $this->_session;
    }

    public function get_total()
    {
        return $this->_total;
    }

}











?>