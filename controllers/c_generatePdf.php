<?php
    session_start();
    $idSession = $_SESSION['id']
?>

<?php
    require_once(MODELS_PATH."ordersItem.php");
    require_once(MODELS_PATH."orders.php");
    require_once(MODELS_PATH."delivery_addresses.php");
    require_once(MODELS_PATH."products.php");
    require_once(CLASSES_PATH.'Pdf.php');
?>

<?php
    
    $orderModel = new OrderManager(true);
    $orderItemModel = new OrderItemManager(true);
    $deliveryAddressModel = new DeliveryAddressesManager(true);
    $productsModel = new ProductsManager(true);

    $order = $orderModel->getOrderById($_SESSION["SESS_ORDERNUM"]);
    $deliveryAddress = $deliveryAddressModel->getDeliveryAddressById($order->get_delivery_add_id());

    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial');

    
    $pdf->Image(OTHER_IMAGES.'logo_bg_white.png',175,3,-200);
    //Date
    $pdf->Cell( 0, 10,"", 0, 0, 'L' ); 
    $pdf->Cell( 0, 10,"", 0, 0, 'L' ); 
    $pdf->writeHTML("<b>DATE: </b>".$order->get_date());
    //$pdf->Cell( 0, 10," DATE: ".$order->get_date(), 0, 0, 'L' ); 

    //Order number
    $pdf->Ln();
    $pdf->writeHTML("<b>NUMERO COMMANDE : </b>".$order->get_id());

    //Customer address
    $pdf->Ln();
    $pdf->SetX(0);
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell( 0, 10,$deliveryAddress->get_firstname().' '.$deliveryAddress->get_lastname(), 0, 0, 'R' ); 
    $pdf->Ln();
    $pdf->SetFont('Arial','',13);
    $pdf->Cell( 0, 10,iconv('utf-8', 'cp1252', $deliveryAddress->get_add1()), 0, 0, 'R' ); 
    $pdf->Ln();
    $pdf->Cell( 0, 2,iconv('utf-8', 'cp1252', $deliveryAddress->get_add2()), 0, 0, 'R' ); 
    $pdf->Ln();
    $pdf->Cell( 0, 10,iconv('utf-8', 'cp1252', $deliveryAddress->get_postcode()), 0, 0, 'R' );
    $pdf->Ln();
    $pdf->Cell( 0, 2,iconv('utf-8', 'cp1252', $deliveryAddress->get_city()), 0, 0, 'R' );

    
   

    //Order array
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    $header = array('PRODUIT', 'QUANTITE', 'PRIX', 'MONTANT');
    $orderItems = $orderItemModel->getOrderItemByOrderId($_SESSION["SESS_ORDERNUM"]);
    $data = [];
    foreach($orderItems as $item)
    {
        $product = $productsModel->getProductsById($item->get_product_id());
        $data[] = array(iconv('utf-8', 'cp1252', $product->get_name()),iconv('utf-8', 'cp1252', $item->get_quantity()),iconv('utf-8', 'cp1252', $product->get_price()),iconv('utf-8', 'cp1252', $item->get_quantity()*$product->get_price()));
    }
    
    $pdf->FancyTable($header, $data);
    $pdf->Ln();
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell( 0, 20,iconv('utf-8', 'cp1252', 'Total : '.$order->get_total().' €'), 0, 0, 'R' );

    $pdf->Ln();
    $pdf->SetX(10);
    //Payment mode
    $pdf->writeHTML("<b>Type de paiement : </b>".$order->get_payment_type());
    if($order->get_payment_type() == 'paypal')
    {
        $pdf->Ln();
        $pdf->writeHTML(iconv('utf-8', 'cp1252',"PaypalID  : Hlc@paypal.com"));
    }
    else
    {
        $pdf->Ln();
        $pdf->Ln();
        $pdf->writeHTML("<b>".iconv('utf-8', 'cp1252',"Instructions pour le paiement : </b>Envoyez le chèque par lettre recommandée à l'adresse suivante : 1 avenue de la Brise, 69100 Villeurbanne"));
    }
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();

    //Footer
    $pdf->SetX(0);
    $pdf->Cell( 0, 20,iconv('utf-8', 'cp1252', "Pour toute question à propos de votre commande : "), 0, 0, 'C' );
    $pdf->Ln();
    $pdf->Cell( 0, 1,iconv('utf-8', 'cp1252', "hlc@support.com"), 0, 0, 'C' );

    $pdf->Output();

?>

