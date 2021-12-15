<?php
class Login
{
    private $_id;
    private $_customer_id;
    private $_username;
    private $_password;

    public function __construct($id,$customer_id,$username,$password)
    {
        $this->_id = $id;
        $this->_customer_id = $customer_id;
        $this->_username = $username;
        $this->_password = $password;
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
     * Get the value of _username
     */ 
    public function get_username()
    {
        return $this->_username;
    }

    /**
     * Set the value of _username
     *
     * @return  self
     */ 
    public function set_username($_username)
    {
        $this->_username = $_username;

        return $this;
    }

    /**
     * Get the value of _password
     */ 
    public function get_password()
    {
        return $this->_password;
    }

    /**
     * Set the value of _password
     *
     * @return  self
     */ 
    public function set_password($_password)
    {
        $this->_password = $_password;

        return $this;
    }
}








?>