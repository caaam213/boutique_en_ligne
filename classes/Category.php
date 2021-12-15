<?php
class Category
{
    private $_id;
    private $_name;

    public function __construct($id,$name)
    {
        $this->_id = $id;
        $this->_name = $name;
    }

    public function get_Id()
    {
        return $this->_id;
    }

    public function get_Name()
    {
        return $this->_name;
    }

}



?>