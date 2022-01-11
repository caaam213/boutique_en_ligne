<?php
    $title = "Accueil";
    $styles = array("stylesLAU_PROD");
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>
<h1 class="text-center">Accueil</h1>



<?php
    //Display categories list
    foreach($categoriesList as $category)
    {
    ?>
        <center><a class="text-white bttn-minimal bttn-md bttn-default text-decoration-none mr-2" href="index.php?action=home&category=<?=$category->get_id()?>"><?=ucfirst($category->get_name())?></a></center>
    <?php
    }
?>

<?php
    //Display products list by their categories
    if(isset($_GET['category']))
    {
        echo '<h3 class="text-center text-white mt-4">Liste des '.$cat->get_name().'</h3>';
        if(isset($listProducts))
        {
            if(sizeof($listProducts) != 0)
            {
                require_once(VIEWS_PATH.'listProducts.php'); 
            }
        }
    }
    else
    {?>
        <div id="carous" class="carousel slide mt-3" data-ride="carousel">
        <div class="carousel-inner mx-auto">
            <div class="carousel-item active">
            <img class="d-block" src=<?=PRODUCT_IMAGES."amandes.jpg"?> width="300" height="300" alt="First slide">
            </div>
            <div class="carousel-item">
            <img class="d-block img-fluid" src=<?=PRODUCT_IMAGES."cafeGrain.jpg"?> width="300" height="300" alt="Second slide">
            </div>
            <div class="carousel-item">
            <img class="d-block img-fluid" src=<?=PRODUCT_IMAGES."biscuitsCannelle.jpg"?> width="300" height="300" alt="Third slide">
            </div>
        </div>
        </div>

        <p class="fst-italic text-center mt-4">Un échantillon de nos produits...</p>
    <?php
    }
    


?>
<?php
    if(!isset($_GET['category']))
    {?>
    <?php
        require_once(VIEWS_PATH.'footer.php');
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

    $(document).ready(function() {

         $('.carousel').carousel({
            interval: 1500
         });
      });
</script>
</html>

