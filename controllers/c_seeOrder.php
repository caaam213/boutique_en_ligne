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

    $orderModel = new OrderManager(true);
    $orderItemsModel = new OrderItemManager(true);
    $productsModel = new ProductsManager(true);
    $deliveryAddressesManager = new DeliveryAddressesManager(true);

    $statusArray = array(
        0 => "Pas encore validée",
        1 => "Adresse saisie",
        2 => "Commande payée",
        10 => "Commande terminée"
    );

    if(isset($_GET['id']))
    {
        $idOrder = htmlspecialchars($_GET['id']);
        $order = $orderModel->getOrderById($idOrder);
        $itemsList = $orderItemsModel->getOrderItemByOrderId($idOrder);
        $deliveryAddress = $deliveryAddressesManager->getDeliveryAddressById($order->get_delivery_add_id());
    }



?>
<?php
    require_once(VIEWS_PATH.'orderInfo.php');

?>