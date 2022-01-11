<?php
class Delivery_address
{
    private $_id;
    private $_firstname;
    private $_lastname;
    private $_add1;
    private $_add2;
    private $_city;
    private $_postcode;
    private $_phone;
    private $_email;

    public function __construct($id,$firstname,$lastname,$add1,$add2,$city,$postcode,$phone,$email)
    {
        $this->_id = $id;
        $this->_firstname = $firstname;
        $this->_lastname = $lastname;
        $this->_add1 = $add1;
        $this->_add2 = $add2;
        $this->_city = $city;
        $this->_postcode = $postcode;
        $this->_phone = $phone;
        $this->_email = $email;
    }

    /**
     * Get the value of _firstname
     */ 
    public function get_firstname()
    {
        return $this->_firstname;
    }

    /**
     * Set the value of _firstname
     *
     * @return  self
     */ 
    public function set_firstname($_firstname)
    {
        $this->_firstname = $_firstname;

        return $this;
    }

    /**
     * Get the value of _lastname
     */ 
    public function get_lastname()
    {
        return $this->_lastname;
    }

    /**
     * Set the value of _lastname
     *
     * @return  self
     */ 
    public function set_lastname($_lastname)
    {
        $this->_lastname = $_lastname;

        return $this;
    }

    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Get the value of _add1
     */ 
    public function get_add1()
    {
        return $this->_add1;
    }

    /**
     * Set the value of _add1
     *
     * @return  self
     */ 
    public function set_add1($_add1)
    {
        $this->_add1 = $_add1;

        return $this;
    }

    /**
     * Get the value of _add2
     */ 
    public function get_add2()
    {
        return $this->_add2;
    }

    /**
     * Set the value of _add2
     *
     * @return  self
     */ 
    public function set_add2($_add2)
    {
        $this->_add2 = $_add2;

        return $this;
    }

    /**
     * Get the value of _city
     */ 
    public function get_city()
    {
        return $this->_city;
    }

    /**
     * Set the value of _city
     *
     * @return  self
     */ 
    public function set_city($_city)
    {
        $this->_city = $_city;

        return $this;
    }

    /**
     * Get the value of _postcode
     */ 
    public function get_postcode()
    {
        return $this->_postcode;
    }

    /**
     * Set the value of _postcode
     *
     * @return  self
     */ 
    public function set_postcode($_postcode)
    {
        $this->_postcode = $_postcode;

        return $this;
    }

    /**
     * Get the value of _phone
     */ 
    public function get_phone()
    {
        return $this->_phone;
    }

    /**
     * Set the value of _phone
     *
     * @return  self
     */ 
    public function set_phone($_phone)
    {
        $this->_phone = $_phone;

        return $this;
    }

    /**
     * Get the value of _email
     */ 
    public function get_email()
    {
        return $this->_email;
    }

    /**
     * Set the value of _email
     *
     * @return  self
     */ 
    public function set_email($_email)
    {
        $this->_email = $_email;

        return $this;
    }
}
?>