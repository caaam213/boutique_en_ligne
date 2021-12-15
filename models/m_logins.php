<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Login.php');
?>

<?php
    class LoginsManager extends Model
    {
        private $_db;

        public function __construct($connection)
        {
            $this->_db = $connection;
        }

        public function getDb()
        {
            return $this->_db;
        }

        public function getAllLogins()
        {
            $loginsList = [];
            $query = "SELECT * FROM logins";
            $logins = $this->queryAll($query);
            foreach ($logins as $result)
            {
                
                $login = new Login($result['id'],$result['customer_id'],
                $result['username'],$result['password']);
                $loginsList[] = $login;
            }
            return $loginsList;
        }

        public function getCustomerIdByUsername($username)
        {
            $query = "SELECT customer_id FROM logins where username=?";
            $customer_id = $this->queryRow($query,array($username));
            return $customer_id;
        }


    }

?>