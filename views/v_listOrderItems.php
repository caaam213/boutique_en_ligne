<table class="table table-striped mt-4">
        <thead>
            <tr>
                <th class="text-center" scope="col">Nom du produit</th>
                <th class="text-center" scope="col">Prix</th>
                <th class="text-center" scope="col">Quantité commandée</th>
                <th class="text-center" scope="col">Quantité restante</th>
            </tr>

        </thead>
        

        <tbody>
        <?php
        foreach ($itemsList as $orderItem) {
            $product = $productsModel->getProductsById($orderItem->get_product_id());
        ?>
            <tr>
                <td class="text-center"><?=$product->get_name()?></td>
                <td class="text-center"><?=$product->get_price()?> €</td>
                <td class="text-center"><?=$orderItem->get_quantity()?></td>
                <td class="text-center"><?=$product->get_quantity()?></td> 

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
