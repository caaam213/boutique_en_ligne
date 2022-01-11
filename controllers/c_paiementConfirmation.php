<?php
    require_once(MODELS_PATH.'orders.php');
    require_once(MODELS_PATH.'ordersItem.php');
    require_once(MODELS_PATH.'products.php');
    require_once(MODELS_PATH.'delivery_addresses.php');
?>



<?php
    if(!isset($_COOKIE['username_admin']))
    {
        header('Location:index.php?action=admin');
    }

    if(isset($_GET['id']))
    {
        if(isset($_GET["confirmation"]))
        {
            $confirmation = htmlspecialchars($_GET["confirmation"]);
            if($confirmation!='true')
            {
                header('Location: index.php?action=paiementConfirmation&id='.$idOrder.'&confirmation=true');
                $idOrder = htmlspecialchars($_GET['id']);
                $orderModel = new OrderManager(true);
                $orderItemsModel = new OrderItemManager(true);
                $productsModel = new ProductsManager(true);
                $deliveryAddressesManager = new DeliveryAddressesManager(true);

                $order = $orderModel->getOrderById($idOrder);
                $itemsList = $orderItemsModel->getOrderItemByOrderId($idOrder);
                if($order->get_status()!=10)
                {
                    $orderModel->updateOrder($order->get_id(),$order->get_customer_id(), 
                    $order->get_registered(), $order->get_delivery_add_id(), 
                    $order->get_payment_type(), $order->get_date(), 10, $order->get_session(), $order->get_total());
                }
                
                
                
            }
            else
            {
                require_once(VIEWS_PATH.'payment_confirmation.php');
            }
            
            
        }
        else
        {
            header('Location: index.php?action=paiementConfirmation&id='.$idOrder.'&confirmation=true');
            $idOrder = htmlspecialchars($_GET['id']);
            $orderModel = new OrderManager(true);
            $orderItemsModel = new OrderItemManager(true);
            $productsModel = new ProductsManager(true);
            $deliveryAddressesManager = new DeliveryAddressesManager(true);

            $order = $orderModel->getOrderById($idOrder);
            $itemsList = $orderItemsModel->getOrderItemByOrderId($idOrder);
            if($order->get_status()!=10)
            {
                $orderModel->updateOrder($order->get_id(),$order->get_customer_id(), 
                $order->get_registered(), $order->get_delivery_add_id(), 
                $order->get_payment_type(), $order->get_date(), 10, $order->get_session(), $order->get_total());
            }
                    
            foreach($itemsList as $orderItem)
            {
                if($order->get_status()!=10)
                {
                    $product = $productsModel->getProductsById($orderItem->get_product_id());
                    $newQuantity = $product->get_quantity() - $orderItem->get_quantity();
                    $productsModel->updateProduct($product->get_id(),$product->get_cat_id(),$product->get_name(),$product->get_description(),$product->get_image(),$product->get_price(),$newQuantity);
                }
                    
            }
            
        }

    }

    

?>


