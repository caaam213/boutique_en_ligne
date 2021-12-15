<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
            </tr>

        </thead>
        

        <tbody>
        <?php
            foreach ($listProducts as $product) {
        ?>
            <tr>
                <th scope="row"><?=$product->get_id()?></th>
                <td><?=$product->get_cat_id()?></td>
                <td><a href="index.php?action=seeProduct&id=<?=$product->get_id()?>"><?=$product->get_name()?></a></td>
                <td><?=$product->get_description()?></td>
                <td><img src="<?=PRODUCT_IMAGES?><?=$product->get_image()?>" alt="" width="50" height="50"/></td>
                <td><?=$product->get_price().' €'?></td>
                <td>
                    <?=($product->get_quantity()==0 ? 'Sold out' : $product->get_quantity())?>
                    <?php
                        if($product->get_quantity()>0)
                        {?>
                            <select name="product<?=$product->get_cat_id()?>">
                                <?php    
                                    for($i = 0;$i<=$product->get_quantity();$i++)
                                    {
                                        ?>
                                         <option value="<?=$i?>"><?= $i ?></option>
                                    <?php
                                    }      
                                    ?>                         
                                   
                                ?>
                            </select>
                        <?php
                        }
                        ?>
                </td>
                <td>
                    <?php
                        if($product->get_quantity()!=0)
                        {
                            ?>
                            <a href="index.php?addProduct=<?=$product->get_id()?>">
                                Ajouter au panier
                            </a> 
                            <?php
                        }
                    ?>
                </td>    
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


