<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Customer.php');
?>

<?php
    class CustomerManager extends Model
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

        public function addCustomer($forname, $surname, $add1, $add2, $add3, $postcode, $phone, $email)
        {
            $query = "INSERT INTO CUSTOMERS(forname,surname,add1,add2,add3,postcode,phone,email,registered) 
            VALUES (:forname,:surname,:add1,:add2,:add3,:postcode,:phone,:email,:registered)";
            $insertCustomer = $this->queryRow($query,[
                'forname' => $forname,
                'surname' => $surname,
                'add1' => $add1,
                'add2' => $add2,
                'add3' => $add3,
                'postcode' => $postcode,
                'phone' => $phone,
                'email' => $email,
                'registered' => 1,]);
        }

        public function getAllCustomers()
        {
            $customersList = [];
            $query = "SELECT * FROM customers";
            $customers = $this->queryAll($query);
            foreach ($customers as $result)
            {
                
                $customer = new Customer($result['id'],$result['forname'],
                $result['surname'],$result['add1'],$result['add2'],$result['add3'],
                $result['postcode'],$result['phone'],$result['email'],$result['registered']
            );
                $customersList[] = $customer;
            }
            return $customersList;
        }

        public function getCustomerById($id)
        {
            $query = "SELECT * FROM CUSTOMERS WHERE id=?";
            $result = $this->queryRow($query,[$id]);
            if($result != null)
            {
                $customer = new Customer($result['id'],$result['forname'],
                $result['surname'],$result['add1'],$result['add2'],$result['add3'],
                $result['postcode'],$result['phone'],$result['email'],$result['registered']);
                return $customer;
            }
            else
            {
                return null;
            }
        }


    }

?>