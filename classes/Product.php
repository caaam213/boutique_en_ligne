<?php
class Product
{
    private $_id;
    private $_cat_id;
    private $_name;
    private $_description;
    private $_image;
    private $_price;
    private $_quantity;

    public function __construct($id,$cat_id,$name,$description,$image,$price,$quantity)
    {
        $this->_id = $id;
        $this->_cat_id = $cat_id;
        $this->_name = $name;
        $this->_description = $description;
        $this->_image = $image;
        $this->_price = $price;
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
     * Get the value of _cat_id
     */ 
    public function get_cat_id()
    {
        return $this->_cat_id;
    }

    /**
     * Get the value of _name
     */ 
    public function get_name()
    {
        return $this->_name;
    }

    /**
     * Get the value of _image
     */ 
    public function get_image()
    {
        return $this->_image;
    }

    /**
     * Get the value of _description
     */ 
    public function get_description()
    {
        return $this->_description;
    }

    /**
     * Get the value of _price
     */ 
    public function get_price()
    {
        return $this->_price;
    }

    /**
     * Get the value of _quantity
     */ 
    public function get_quantity()
    {
        return $this->_quantity;
    }

    /**
     * Set the value of _quantity
     *
     * @return  self
     */ 
    public function set_quantity($_quantity)
    {
        $this->_quantity = $_quantity;

        return $this;
    }
}





?>