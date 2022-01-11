<?php
    $title = "Commande n°".$order->get_id();
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;" class="bg-light container">
    <div class="mt-4"></div>
    <center><a class="bttn-stretch bttn-lg bttn-royal text-decoration-none" href="index.php?action=admin_manager">Retour</a></center>
    <h1 class="text-center">Commande n°<?=$order->get_id() ?></h1>

    <h2 class="text-center">Information du client : </h2>
    <p class="text-center">Nom : <?=$deliveryAddress->get_lastname()?></p>
    <p class="text-center">Prénom : <?=$deliveryAddress->get_firstname()?></p>
    <p class="text-center">Adresse : <?=$deliveryAddress->get_add1().' '.$deliveryAddress->get_add2()?></p>
    <p class="text-center">Code postal et ville : <?=$deliveryAddress->get_postcode().', '.$deliveryAddress->get_city()?></p>
    <p class="text-center">Numéro du téléphone : <?=$deliveryAddress->get_phone()?></p>
    <p class="text-center">Numéro du téléphone : <?=$deliveryAddress->get_email()?></p>

    <h2 class="text-center">Paiement : </h2>
    <p class="text-center">Date : <?=$order->get_date()?></p>
    <p class="text-center">Type de paiement : <?=$order->get_payment_type()?></p>

    <h2 class="text-center">Liste des produits : </h2>
    <?php require_once(VIEWS_PATH.'listOrderItems.php');?>

    <?php
    if($order->get_status()==2)
    {
        ?>
        <a href=<?="index.php?action=paiementConfirmation&id=".$idOrder?> class="btn btn-success">Confirmer le paiement</a></td>
    <?php
    }
    ?>


</body>
</html>
