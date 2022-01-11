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
            $query = "SELECT * FROM logins where username=?";
            $result = $this->queryRow($query,array($username));
            $login = new Login($result['id'],$result['customer_id'],
                $result['username'],$result['password']);
            return $login;
        }

        public function addLogin($customer_id, $username, $password)
        {
            $query = "INSERT INTO LOGINS(customer_id, username, password) 
            VALUES (:customer_id,:username,:password)";
            $insertLogin = $this->queryRow($query,[
                'customer_id' => $customer_id,
                'username' => $username,
                'password' => $password,]);
        }


    }

?>