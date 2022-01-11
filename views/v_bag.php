<?php
    $title = "Votre panier";
    $styles = array("bag");
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>

<br/>
<center><a class="bttn-stretch bttn-md bttn-default text-center text-decoration-none" href="index.php?action=home">Retour à l'accueil</a></center>
<?php
    if(count($listItems)!=0)
    {?>
<div class="d-flex justify-content-center">
    <table class="table table-striped w-75 mt-2">
        <thead>
            <tr>
                <th scope="col" class="text-white text-center">Nom</th>
                <th scope="col" class="text-white text-center">Image</th>
                <th scope="col" class="text-white text-center">Prix</th>
                <th scope="col" class="text-white text-center">Quantité</th>
            </tr>
        </thead>

        <tbody>
    <?php
    }
    
?>
        <?php
            if(count($listItems)!=0)
            {
                foreach ($listItems as $item) {
                    $idItem = $item->get_product_id();
                    $product = $productModel->getProductsById($idItem);

        ?>
                <tr>
                    <td class="text-white text-center"><?=$product->get_name()?></td>
                    <td class="text-center"><img src="<?=PRODUCT_IMAGES?><?=$product->get_image()?>" alt="" width="100" height="100"/></td>
                    <td class="text-white text-center"><?=$product->get_price().' €'?></td>
                    <td class="text-white text-center">
                        <?=($product->get_quantity()==0 ? 'Sold out' : $item->get_quantity())?>
                    </td>
                    <td><a href="index.php?action=seeProduct&id=<?=$product->get_id()?>"><img src="<?=OTHER_IMAGES.'details.png'?>" width="40" height="40"/></a></td> 
                    <td>
                        <?php
                            if($product->get_quantity()!=0)
                            {
                                ?>
                                <a id="product<?=$product->get_id()?>" href="index.php?action=delete&orderItemId=<?=$item->get_id()?>">
                                <img src="<?=OTHER_IMAGES.'remove.png'?>" width="40" height="40"/>
                                </a> 
                                <?php
                            }
                        ?>
                    </td>   
                    
                </tr>
                
            <?php
                
                }?>
                </tbody>
                </table>
                </div>
                <?php
                if(isset($_SESSION["SESS_ORDERNUM"]))
                {?>
                    <div class="mx-auto w-25">
                    <div class="row">
                    <p class="col fw-bold"><?="Total : ".$order->get_total()."€"?></p>
                
                    <a class="col bttn-gradient bttn-sm bttn-success text-decoration-none w-50 text-center" href='index.php?action=addressesChoice'>Aller en caisse</a>
                    </div>
                    </div>
                <?php
                }
                
                    
            ?>
            
            <?php
            }
            else
            {?>
                <p class="display-3 text-center">Panier vide</p>
                </div>
            <?php
            }
            
            ?>
