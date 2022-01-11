        <div class="row justify-content-around">
        <?php
            foreach ($listProducts as $product) {
        ?>
            <div class="col-xl-2 col-10 mt-5">
                <div class="card mt-3">
                    <div class="product-1 align-items-center p-2 text-center">
                        <img src="<?=PRODUCT_IMAGES?><?=$product->get_image()?>" alt="" width="160">
                        <h5 class="text-dark"><?=$product->get_name() ?></h5>

                        <!--card information-->
                        <div class="mt-3 info">
                            <span class="text1 d-block"><?=$product->get_description()?></span>
                        </div>
                        <div class="cost mt-3 text-dark">
                            <span><?=$product->get_price()?> € </span>
                            <div class="star mt-3 align-items-center">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                        </div>
                        <!--card info here-->
                        <td>
                        <a class="text-decoration-none text-secondary"><?=($product->get_quantity()==0 ? 'Sold out' : $product->get_quantity().' en stock')?></a>
                    <?php
                        if($product->get_quantity()>0)
                        {?>
                            <select onchange="changeQuantity(<?=$product->get_id()?>)" id="select<?=$product->get_id()?>" name="product<?=$product->get_cat_id()?>">
                                <?php    
                                    for($i = 1;$i<=$product->get_quantity();$i++)
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
                        <br/>
                        <a class="text-decoration-none text-secondary bttn-minimal bttn-sm bttn-danger mt-5" href="index.php?action=seeProduct&id=<?=$product->get_id()?>">Voir détail</a>
                        <!--bottom for cards-->
                        <div class="p-3 product text-center text-white mt-3 cursor">
                            <a class="text-decoration-none text-white" id="product<?=$product->get_id()?>" href="index.php?action=add&product=<?=$product->get_id()?>&quantity=1">
                                Ajouter au panier
                            </a> 
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
        </div>


