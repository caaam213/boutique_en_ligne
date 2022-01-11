<?php
    session_start();
    $idSession = $_SESSION['id']
?>

<?php
    require_once(MODELS_PATH.'ordersItem.php');
    require_once(MODELS_PATH.'orders.php');
    require_once(MODELS_PATH.'products.php');
?>

<?php
    $orderItemModel = new OrderItemManager(true);
    $orderModel = new OrderManager(true);
    $productModel = new ProductsManager(true);
    if(isset($_GET['product']))
    {
        $idProduct = htmlspecialchars($_GET['product']);
        $quantity = htmlspecialchars($_GET['quantity']);
        $product = $productModel->getProductsById($idProduct);
        $price = $product->get_price() * $quantity;
        
        if(isset($_SESSION["SESS_ORDERNUM"]))
        {
            //If it's the first time the person make an order
            if($orderModel->getOrderById($_SESSION["SESS_ORDERNUM"])==null)
            {
                //If the person is connected
                if(isset($_COOKIE['username']))
                {
                    $id_customer = $_COOKIE['customer_id'];
                    $orderModel->addOrder($id_customer,1,NULL,NULL,date("Y-m-d"),0,$idSession,$price);
                    $lastId = Connection::getInstance()->getDb()->lastInsertId();
                    
                }
                else
                {
                    $orderModel->addOrder(NULL,0,NULL,NULL,date("Y-m-d"),0,$idSession,$price);
                    $lastId = Connection::getInstance()->getDb()->lastInsertId();
                }
                //Create an order session
                $_SESSION["SESS_ORDERNUM"] = $lastId;
                $orderItemModel->addOrderItem($_SESSION["SESS_ORDERNUM"],$idProduct,$quantity);
                $lastId = Connection::getInstance()->getDb()->lastInsertId();
                
                    
                
            }
            else
            {
                //If the person is connected
                if(isset($_COOKIE['username']))
                {
                    $id_customer = $_COOKIE['customer_id'];
                }
                else
                {
                    $id_customer = null;
                }
                $order = $orderModel->getOrderById($_SESSION["SESS_ORDERNUM"]);
                $orderModel->updateOrder($order->get_id(),$id_customer, 
                1, $order->get_delivery_add_id(), 
                $order->get_payment_type(), $order->get_date(), $order->get_status(), $order->get_session(), $order->get_total()+$price);
                $orderItemModel->addOrderItem($_SESSION["SESS_ORDERNUM"],$idProduct,$quantity);
                $lastId = Connection::getInstance()->getDb()->lastInsertId();
                
                    
            
            }
            
        }
        else
        {
            if(isset($_COOKIE['username']))
            {
                $id_customer = $_COOKIE['customer_id'];
                $orderModel->addOrder($id_customer,1,NULL,NULL,date("Y-m-d"),0,$idSession,$price);
                $lastId = Connection::getInstance()->getDb()->lastInsertId();
            }
            else
            {
                $orderModel->addOrder(NULL,0,NULL,NULL,date("Y-m-d"),0,$idSession,$price);
                $lastId = Connection::getInstance()->getDb()->lastInsertId();
            }
            $_SESSION["SESS_ORDERNUM"] = $lastId;
            $orderItemModel->addOrderItem($_SESSION["SESS_ORDERNUM"],$idProduct,$quantity);
            
                    
            
        }
        header('Location:index.php?action=bag');
        $newQuantity = $product->get_quantity() - $orderItemModel->getOrderItemById($lastId)->get_quantity();
        $productModel->updateProduct($product->get_id(),$product->get_cat_id(),$product->get_name(),$product->get_description(),$product->get_image(),$product->get_price(),$newQuantity);
        
        
        
        
    }
    


?>