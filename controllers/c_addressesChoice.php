<?php
    session_start();
    $idSession = $_SESSION['id']
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
    if(isset($_COOKIE['customer_id']))
    {
        $id = $_COOKIE['customer_id'];
        $customer = $customerModel->getCustomerById($id);
    }

    if(isset($_POST['addAddressForm']))
    {
        if(!isset($_COOKIE['customer_id']))
        {
            $firstname = htmlspecialchars($_POST["firstname"]);
            $lastname = htmlspecialchars($_POST["lastname"]);
            $add1 = htmlspecialchars($_POST["add1"]);
            $add2 = htmlspecialchars($_POST["add2"]);
            $city = htmlspecialchars($_POST["city"]);
            $postcode = htmlspecialchars($_POST['postcode']);
            $phone = htmlspecialchars($_POST['phone']);
            $email = htmlspecialchars($_POST['email']);
        }
        else
        {
            $firstname = $customer->get_forname();
            $lastname = $customer->get_surname();
            $add1 = htmlspecialchars($_POST["add1"]);
            $add2 = htmlspecialchars($_POST["add2"]);
            $city = htmlspecialchars($_POST["city"]);
            $postcode = htmlspecialchars($_POST['postcode']);
            $phone = $customer->get_phone();
            $email = $customer->get_email();
        }
        
        header("Location:index.php?action=payment");
        $deliveryAddressModel->addDeliveryAddress($firstname, $lastname, $add1, $add2, $city, $postcode, $phone, $email);
        $idDeliveryAddress = Connection::getInstance()->getDb()->lastInsertId();
        $orderModel->updateOrder($order->get_id(),$order->get_customer_id(),$order->get_registered(),$idDeliveryAddress, $order->get_payment_type(), $order->get_date(), 1, $order->get_session(), $order->get_total());
        

    }

    if(isset($_POST['addAddressInAccount']))
    {
        if(isset($_COOKIE['customer_id']))
        {
            header("Location:index.php?action=payment");
            $firstname = $customer->get_forname();
            $lastname = $customer->get_surname();
            $add1 = $customer->get_add1();
            $add2 = $customer->get_add2();
            $city = $customer->get_add3();
            $postcode = $customer->get_postcode();
            $phone = $customer->get_phone();
            $email = $customer->get_email();
            $deliveryAddressModel->addDeliveryAddress($firstname, $lastname, $add1, $add2, $city, $postcode, $phone, $email);
            $idDeliveryAddress = Connection::getInstance()->getDb()->lastInsertId();
            $orderModel->updateOrder($order->get_id(),$order->get_customer_id(),$order->get_registered(),$idDeliveryAddress, $order->get_payment_type(), $order->get_date(), 1, $order->get_session(), $order->get_total());
            
        }

    }

?>

<?php
    require_once(VIEWS_PATH."delivery_addresses.php");
?>