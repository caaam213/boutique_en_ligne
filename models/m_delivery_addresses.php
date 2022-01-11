<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Delivery_address.php');
?>

<?php
    class DeliveryAddressesManager extends Model    
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

        public function addDeliveryAddress($firstname, $lastname, $add1, $add2, $city, $postcode, $phone, $email)
        {
            $query = "INSERT INTO `delivery_addresses`(`firstname`, `lastname`, `add1`, `add2`, `city`, `postcode`, `phone`, `email`) VALUES (?,?,?,?,?,?,?,?)";
            $addAddress = $this->queryRow($query,[$firstname, $lastname, $add1, $add2, $city, $postcode, $phone, $email]);
        }

        public function getDeliveryAddressById($id)
        {
            $query = "SELECT * FROM `delivery_addresses` WHERE `id`=?";
            $result = $this->queryRow($query,[$id]);
            $address = new Delivery_address($result['id'],$result['firstname'],$result['lastname'],$result['add1'],$result['add2'],$result['city'],$result['postcode'],$result['phone'],$result['email']);
            return $address;
        }
    }



?>