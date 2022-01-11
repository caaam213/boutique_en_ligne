<?php
    session_start();
    $idSession = $_SESSION['id'];
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
    if(isset($_COOKIE['customer_id']))
    {
        $idCustomer = $_COOKIE['customer_id'];
        $listOrders = $orderModel->getCurrentOrderByCustomerId($idCustomer);
        if($listOrders!=null)
        {
            $_SESSION["SESS_ORDERNUM"] = $listOrders->get_id();
        }
        
    }
    else
    {
        $idCustomer = null;
        $listOrders = $orderModel->getOrderByIdAndCustomer($idSession,$idCustomer);
    }

    
    $listItems = [];
    if(isset($_SESSION["SESS_ORDERNUM"]))
    {
        $listItems = $orderItemModel->getOrderItemByOrderId($_SESSION["SESS_ORDERNUM"]);
        $order = $orderModel->getOrderById($_SESSION["SESS_ORDERNUM"]); 
    }
        
?>

<?php
    require_once(VIEWS_PATH.'bag.php');
?>