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

    if(isset($_GET['logout']))
    {
        setcookie ("username_admin", "", time() - 3600);
        header('Location: index.php?action=admin');
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

    if(isset($_POST['inProgress']))
    {
        $ordersList = $orderModel->getOrderByStatus(2);
    }
    else
    {
        $ordersList = $orderModel->getAllOrders();
    }
    



?>
<?php
    require_once(VIEWS_PATH.'admin_manager.php');

?>