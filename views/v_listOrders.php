<table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col" class="text-center">Numéro de commande</th>
                <th scope="col">Nom</th>
                <th scope="col">Total</th>
                <th scope="col" class="text-center">Type du paiement</th>
                <?php if(!isset($_POST['inProgress'])){ echo '<th scope="col" class="text-center">Statut</th>';}?>
            </tr>

        </thead>
        

        <tbody>
        <?php
        foreach ($ordersList as $order) {
            $deliveryAddress = $deliveryAddressesManager->getDeliveryAddressById($order->get_delivery_add_id());
            $name = $deliveryAddress->get_lastname();
            $product = $productsModel->getProductsById($order->get_id());
        ?>
            <tr>
                <td class="text-center"><?=$order->get_id()?></td>
                <td><?=$name?></td>
                <td><?=$order->get_total().' €'?></td>
                <td class="text-center"><?=ucfirst($order->get_payment_type())?></td>   
                <?php if(!isset($_POST['inProgress'])){ echo '<td class="text-center">'.$statusArray[$order->get_status()].'</td>';}?>
                <div class="row">
                    <td class="text-center"><a href="index.php?action=seeOrder&id=<?=$order->get_id()?>" class="btn btn-dark details">Voir détail</a></td>
                    <td class="text-center"><?php if($order->get_status()==2){ echo '<a href="index.php?action=paiementConfirmation&id='.$order->get_id().'" class="btn btn-dark payment">Confirmer le paiement</a>';}?></td>
                </div>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
    </div>