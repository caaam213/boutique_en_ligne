<?php
    require_once(MODELS_PATH.'model.php');
    require_once(CLASSES_PATH.'Orderitem.php');
?>

<?php
    class OrderItemManager extends Model
    {
        public function addOrderItem($order_id, $product_id, $quantity)
        {
            $query = "INSERT INTO ORDERITEMS(order_id,product_id,quantity) 
            VALUES (:order_id,:product_id,:quantity)";
            $insertOrderItem = $this->queryRow($query,[
                'order_id' => $order_id,
                'product_id' => $product_id,
                'quantity' => $quantity,]);
            
        }

        public function getOrderItemById($id)
        {
            $query = "SELECT * from OrderItems where id=?";
            $orderResult = $this->queryRow($query,[$id]);
            if($orderResult == null)
            {
                return null;
            }
            else
            {
                $order = new Orderitem($orderResult['id'],$orderResult['order_id'],$orderResult['product_id'],$orderResult['quantity']);
                return $order;
            }
        }

        public function getOrderItemByOrderId($order_id)
        {
            $listItems = [];
            $query = "SELECT * from OrderItems where order_id=?";
            $ordersResult = $this->queryAll($query,[$order_id]);
            foreach($ordersResult as $orderRes)
            {
                $order = new Orderitem($orderRes['id'],$orderRes['order_id'],$orderRes['product_id'],$orderRes['quantity']);
                $listItems[] = $order;
            }
            return $listItems;
            
        }

        public function deleteItemById($id)
        {
            $query = "DELETE from OrderItems where id=?";
            $item = $this->queryRow($query,[$id]);
        }

        
    }
?>