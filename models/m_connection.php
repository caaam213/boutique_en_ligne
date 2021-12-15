<?php
//Using singleton pattern
class Connection
{
    private $_db = null;
    private static $_instance = null;

    private function __construct()
    {
        $this->_db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASSWORD);
        $this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_db->exec('SET CHARACTER SET utf8');
    }

    public static function getInstance()
    {
        if(is_null(self::$_instance))
        {
            self::$_instance = new Connection();
        }
        return self::$_instance;
    }

    public function getDb()
    {
        return $this->_db;
    }
}

?>