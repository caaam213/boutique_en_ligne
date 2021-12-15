<?php
    require_once(MODELS_PATH.'connection.php');
?>

<?php
    

    abstract class Model
    {
        private $_error; //Store error message associated with PDOException

        public function __construct()
        {

        }

        public function getError()
        {
            return $this->_error;
        }

        private function _query($sql, $args=null)
        {
            if($args == null)
            {
                $pdos = Connection::getInstance()->getDb()->query($sql);
            }
            else
            {
                $pdos = Connection::getInstance()->getDb()->prepare($sql);
                $pdos->execute($args);
            }
            return $pdos;
        }

        //Return one data
        public function queryRow($sql, $args=null)
        {
            try
            {
                $pdos = $this->_query($sql, $args);
                $result = $pdos->fetch();
                $pdos->closeCursor();
            }
            catch (PDOException $e)
            {
                $this->_error = ($e->getMessage());
            }
            return $result;
        }

        //Return several data
        public function queryAll($sql, $args=null)
        {
            try
            {
                $pdos = $this->_query($sql, $args);
                $results = $pdos->fetchAll(PDO::FETCH_ASSOC);
                $pdos->closeCursor();
            }
            catch (PDOException $e)
            {
                $this->_error = ($e->getMessage());
            }
            return $results;
        }

    }




?>