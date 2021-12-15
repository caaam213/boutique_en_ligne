<?php
class Review 
{
    private $_id_product;
    private $_name_user;
    private $_photo_user;
    private $_stars;
    private $_title;
    private $_description;

    function __construct($id,$name,$photo,$stars,$title,$description)
    {
        $this->_id_product = $id;
        $this->_name_user = $name;
        $this->_photo_user = $photo;
        $this->_stars = $stars;
        $this->_title = $title;
        $this->_description = $description;
    }

    

    /**
     * Get the value of _id_product
     */ 
    public function get_id_product()
    {
        return $this->_id_product;
    }

    /**
     * Get the value of _name_user
     */ 
    public function get_name_user()
    {
        return $this->_name_user;
    }

    /**
     * Get the value of _photo_user
     */ 
    public function get_photo_user()
    {
        return $this->_photo_user;
    }

    /**
     * Get the value of _stars
     */ 
    public function get_stars()
    {
        return $this->_stars;
    }

    /**
     * Get the value of _title
     */ 
    public function get_title()
    {
        return $this->_title;
    }

    /**
     * Get the value of _description
     */ 
    public function get_description()
    {
        return $this->_description;
    }
}




?>