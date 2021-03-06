<?php
class Customer
{
    private $_id;
    private $_forname;
    private $_surname;
    private $_add1;
    private $_add2;
    private $_add3;
    private $_postcode;
    private $_phone;
    private $_email;
    private $_registered;

    public function __construct($id,$forname,$surname,$add1,$add2,$add3,$postcode,$phone,$email,$registered)
    {
        $this->_id = $id;
        $this->_forname = $forname;
        $this->_surname = $surname;
        $this->_add1 = $add1;
        $this->_add2 = $add2;
        $this->_add3 = $add3;
        $this->_postcode = $postcode;
        $this->_phone = $phone;
        $this->_email = $email;
        $this->_registered = $registered;
    }
    
    /**
     * Get the value of _id
     */ 
    public function get_id()
    {
        return $this->_id;
    }

    /**
     * Get the value of _forname
     */ 
    public function get_forname()
    {
        return $this->_forname;
    }

    /**
     * Set the value of _forname
     *
     * @return  self
     */ 
    public function set_forname($_forname)
    {
        $this->_forname = $_forname;

        return $this;
    }

    /**
     * Get the value of _surname
     */ 
    public function get_surname()
    {
        return $this->_surname;
    }

    /**
     * Set the value of _surname
     *
     * @return  self
     */ 
    public function set_surname($_surname)
    {
        $this->_surname = $_surname;

        return $this;
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
     * Get the value of _add3
     */ 
    public function get_add3()
    {
        return $this->_add3;
    }

    /**
     * Set the value of _add3
     *
     * @return  self
     */ 
    public function set_add3($_add3)
    {
        $this->_add3 = $_add3;

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
}








?>