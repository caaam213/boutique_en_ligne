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

    if(isset($_GET['orderItemId']))
    {
        $idItem = htmlspecialchars($_GET['orderItemId']);
        $item = $orderItemModel->getOrderItemById($idItem);
        $order = $orderModel->getOrderById($_SESSION["SESS_ORDERNUM"]);
        $product = $productModel->getProductsById($item->get_product_id());
        $total = $order->get_total() - $product->get_price() * $item->get_quantity();
        
        
        $orderModel->updateOrder($order->get_id(),$order->get_customer_id(),$order->get_registered(),$order->get_delivery_add_id(),$order->get_payment_type(),$order->get_date(),$order->get_status(),$order->get_session(),$total);
        header('Location: index.php?action=bag');
        //If the customer remove an item, get the initial quantity
        $newQuantity = $product->get_quantity() + $item->get_quantity();
        $orderItemModel->deleteItemById($idItem);
        $productModel->updateProduct($product->get_id(),$product->get_cat_id(),$product->get_name(),$product->get_description(),$product->get_image(),$product->get_price(),$newQuantity);
    }
?>