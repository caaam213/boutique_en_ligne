<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Order.php');
?>

<?php
    class OrderManager extends Model
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

        public function addOrder($customer_id, $registered, $delivery_add_id, $payment_type, $date, $status, $session, $total)
        {
            $query = "INSERT INTO `orders`(`customer_id`, `registered`, `delivery_add_id`, `payment_type`, `date`, `status`, `session`, `total`)
            VALUES (?,?,?,?,?,?,?,?)";
            $insertOrder = $this->queryRow($query,[
                $customer_id,
                $registered,
                $delivery_add_id,
                $payment_type,
                $date,
                $status,
                $session,
                $total,]);
        }

        public function updateOrder($id,$customer_id, $registered, $delivery_add_id, $payment_type, $date, $status, $session, $total)
        {
            $query = "UPDATE orders SET `customer_id`=?,`registered`=?,`delivery_add_id`=?,`payment_type`=?,`date`=?,`status`=?,`session`=?,`total`=? WHERE id=?";
            $updateOrder = $this->queryRow($query,[
                $customer_id,
                $registered,
                $delivery_add_id,
                $payment_type,
                $date,
                $status,
                $session,
                $total,
                $id]);
        }

        public function getOrderById($id)
        {
            $query = "SELECT * from Orders where id=?";
            $orderResult = $this->queryRow($query,[$id]);
            if($orderResult == null)
            {
                return null;
            }
            else
            {
                $order = new Order($orderResult['id'],$orderResult['customer_id'],$orderResult['registered'],$orderResult['delivery_add_id'],$orderResult['payment_type'],
                $orderResult['date'],$orderResult['status'],$orderResult['session'],$orderResult['total']);
                return $order;
            }
        }

        public function getOrderByIdAndCustomer($id,$idCustomer)
        {
            $query = "SELECT * from Orders where session=? and customer_id=? and status=0";
            $orderResult = $this->queryRow($query,[$id,$idCustomer]);
            if($orderResult == null)
            {
                return null;
            }
            else
            {
                $order = new Order($orderResult['id'],$orderResult['customer_id'],$orderResult['registered'],$orderResult['delivery_add_id'],$orderResult['payment_type'],
                $orderResult['date'],$orderResult['status'],$orderResult['session'],$orderResult['total']);
                return $order;
            }
        }

        public function getCurrentOrderByCustomerId($idCustomer)
        {
            $query = "SELECT * from Orders where status=0 and customer_id=?";
            $orderResult = $this->queryRow($query,[$idCustomer]);
            if($orderResult == null)
            {
                return null;
            }
            else
            {
                $order = new Order($orderResult['id'],$orderResult['customer_id'],$orderResult['registered'],$orderResult['delivery_add_id'],$orderResult['payment_type'],
                $orderResult['date'],$orderResult['status'],$orderResult['session'],$orderResult['total']);
                return $order;
            }
        }

        public function getOrderByStatus($status)
        {
            $ordersList = [];
            $query = "SELECT * from Orders where status=?";
            $orderResults = $this->queryAll($query,[$status]);
            foreach($orderResults as $orderResult)
            {
                $order = new Order($orderResult['id'],$orderResult['customer_id'],$orderResult['registered'],$orderResult['delivery_add_id'],$orderResult['payment_type'],
                $orderResult['date'],$orderResult['status'],$orderResult['session'],$orderResult['total']);
                $ordersList[] = $order;
            }
            return $ordersList;
        }

        public function getAllOrders()
        {
            $ordersList = [];
            $query = "SELECT * from Orders";
            $orderResults = $this->queryAll($query);
            foreach($orderResults as $orderResult)
            {
                $order = new Order($orderResult['id'],$orderResult['customer_id'],$orderResult['registered'],$orderResult['delivery_add_id'],$orderResult['payment_type'],
                $orderResult['date'],$orderResult['status'],$orderResult['session'],$orderResult['total']);
                $ordersList[] = $order;
            }
            return $ordersList;
        }
        

        public function deleteOrder($id)
        {
            $query = "DELETE FROM ORDERS WHERE id=?";
            $orderResult = $this->queryRow($query,[$id]);
        }


    }
?>