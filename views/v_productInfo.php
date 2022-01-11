<?php
    $title = $product->get_name();
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>
<div class="mt-4"></div>
<center><a class="bttn-stretch bttn-lg bttn-danger text-center text-decoration-none mt-5" href="index.php?action=home">Retour</a></center>
<p class="text-center display-4">Produit : <?= $product->get_name() ?></p>
<p class="text-center">Description : <?= $product->get_description() ?></p>
<p class="text-center">
<img src="<?=PRODUCT_IMAGES?><?=$product->get_image()?>" class="mt-2" alt="" width="300" height="300"/>
</p>
<br/>
<p class="text-center">Prix : <?= $product->get_price() ?> €</p>
<p class="text-center">Stock restant : <?=$product->get_quantity() ?></p>
<div class="text-center">
    <span>Séléctionnez la quantité :</span>
    <select onchange="changeQuantity(<?=$product->get_id()?>)" id="select<?=$product->get_id()?>" name="product<?=$product->get_cat_id()?>">

    <?php    
        for($i = 1;$i<=$product->get_quantity();$i++)
        {
        ?>
        <option value="<?=$i?>"><?= $i ?></option>
        <?php
        }      
        ?>                         
    </select>

    
</div>

<?php
    if($product->get_quantity()!=0)
    {
        ?>
        <p class="text-center mt-4">
        <a class="bttn-gradient bttn-lg bttn-success text-decoration-none" id="product<?=$product->get_id()?>" href="index.php?action=add&product=<?=$product->get_id()?>&quantity=1">
            Ajouter au panier
        </a> 
        </p>
        <?php
        }
    ?>

<?php
    $sum = 0;
    $reviewsNumber = 0;
    foreach($reviewsList as $review)
    {
        $sum += $review->get_stars();
        $reviewsNumber++;
    }
?>

<h2 class="mt-5 text-center">Tous les avis</h2>

<p class="text-center">Moyenne des avis : <?=$sum/$reviewsNumber?>/5</p>

<?php
    foreach($reviewsList as $review)
    {?>
        <p class="text-center"><b><?=ucfirst($review->get_title()) ?></b></p>
        <p class="text-center">
        <img src="<?=PRODUCT_IMAGES?><?=$review->get_photo_user()?>" alt="" width="100" height="100"/>
        </p>
        <p class="text-center">Nom d'utilisateur : <?=$review->get_name_user()?></p>
        <p class="text-center">Commentaire : <?=$review->get_description()?></p>
        <hr>
    <?php
    }
?>

</body>

<script>
    function changeQuantity(idProduct)
    {
        var quantity = document.getElementById("select"+idProduct).value;
        console.log(idProduct);
        var link = document.getElementById("product"+idProduct);
        link.setAttribute("href","index.php?action=add&product="+idProduct+"&quantity="+quantity);
    }
</script>
</html>
