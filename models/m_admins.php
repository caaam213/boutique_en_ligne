<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Admin.php');
?>

<?php
    class AdminsManager extends Model
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

        public function getAllAdmins()
        {
            $loginsList = [];
            $query = "SELECT * FROM admin";
            $logins = $this->queryAll($query);
            foreach ($logins as $result)
            {
                $login = new Admin($result['id'],$result['username'],$result['password']);
                $loginsList[] = $login;
            }
            return $loginsList;
        }

        public function getAdminIdByUsername($username)
        {
            $query = "SELECT * FROM admin where username=?";
            $result = $this->queryRow($query,array($username));
            $admin = new Admin($result['id'],$result['username'],$result['password']);
            return $admin;
        }
    }
?>