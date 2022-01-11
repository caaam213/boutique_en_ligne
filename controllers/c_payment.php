<?php
    session_start();
    $idSession = $_SESSION['id'];
?>
<?php
    require_once(MODELS_PATH."customers.php");
    require_once(MODELS_PATH."orders.php");
    require_once(MODELS_PATH."delivery_addresses.php");

?>

<?php
    $orderModel = new OrderManager(true);
    $customerModel = new CustomerManager(true);
    $deliveryAddressModel = new DeliveryAddressesManager(true);
    $order = $orderModel->getOrderById($_SESSION["SESS_ORDERNUM"]);

    if(isset($_POST['paypal']))
    {
        
        $orderModel->updateOrder($order->get_id(),$order->get_customer_id(),$order->get_registered(),$order->get_delivery_add_id(), "paypal", $order->get_date(), 2, $order->get_session(), $order->get_total());
        header('Location: index.php?action=generatePdf');
        
    }

    if(isset($_POST['cheque']))
    {
        $orderModel->updateOrder($order->get_id(),$order->get_customer_id(),$order->get_registered(),$order->get_delivery_add_id(), "cheque", $order->get_date(), 2, $order->get_session(), $order->get_total());
        header('Location: index.php?action=generatePdf');
    }
?>

<?php
if($order->get_status()==2 || $order->get_status()==10)
{
    require_once(VIEWS_PATH."payment_confirmation.php");
}
else
{
    require_once(VIEWS_PATH."payment.php");
}
?>