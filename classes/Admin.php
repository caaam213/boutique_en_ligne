<?php
class Admin
{
    private $_id;
    private $_username;
    private $_password;

    public function __construct($id,$username,$password)
    {
        $this->_id = $id;
        $this->_username = $username;
        $this->_password = $password;
    }

    public function get_Id()
    {
        return $this->_id;
    }

    public function get_Username()
    {
        return $this->_username;
    }

    public function get_Password()
    {
        return $this->_password;
    }
}












?>