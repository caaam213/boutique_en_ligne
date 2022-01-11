<?php
    $title = "Choix de l'adresse";
    $style = array("delivery_addresses");
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>

<div class="text-center">
  <img src=<?= OTHER_IMAGES."address.png"?> class="img-fluid" alt="...">
</div>
<center><a class="bttn-stretch bttn-md bttn-default text-center text-decoration-none mt-5" href="index.php?action=home">Retour à l'accueil</a></center>
<h1 class="text-center mt-3">Choix de l'adresse de livraison</h1>
<p class="text-center fst-italic">Etape 1 sur 3</p>
<form class="row mx-auto" style="width:400px;" action="index.php?action=addressesChoice" method="POST">
    <?php
        if(!isset($customer))
        {?>
            <label for="firstname">Prénom</label>
            <input class="form-control col-5" type="text" name="firstname" <?php if(!isset($_COOKIE['username'])){echo 'onfocusout="enableButton()"';}else{echo 'onfocusout="checkPostCodeOnly()"';}?> required>
            
            <label for="lastname">Nom</label>
            <input class="form-control col-7" type="text" name="lastname" <?php if(!isset($_COOKIE['username'])){echo 'onfocusout="enableButton()"';}else{echo 'onfocusout="checkPostCodeOnly()"';}?> required>

              

            <label for="phone" class="form-label">Numéro de téléphone</label>
            <input type="text" class="form-control" <?php if(!isset($_COOKIE['username'])){echo 'onKeyUp="checkPhone()"';}?> name="phone" required>
            <span id="error_phone" class="text-center" style="color:#ff5964;"></span>

            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" <?php if(!isset($_COOKIE['username'])){echo 'onKeyUp="checkEmail()"';}?> name="email" required>
            <span id="error_email" class="text-center" style="color:#ff5964;"></span>
        <?php
    }?>

    <label for="add1">Adresse</label>
    <input class="form-control col-7" type="text" name="add1" <?php if(!isset($_COOKIE['username'])){echo 'onfocusout="enableButton()"';}else{echo 'onfocusout="checkPostCodeOnly()"';}?> required/>

    <label for="add2">Complément d'adresse</label>
    <input class="form-control col-10" type="text" name="add2" <?php if(!isset($_COOKIE['username'])){echo 'onfocusout="enableButton()"';}else{echo 'onfocusout="checkPostCodeOnly()"';}?>/>

    <label for="city">Ville</label>
    <input class="form-control col-10" type="text" name="city" <?php if(!isset($_COOKIE['username'])){echo 'onfocusout="enableButton()"';}else{echo 'onfocusout="checkPostCodeOnly()"';}?> required/>

    <label for="postcode" class="form-label">Code postal</label>
    <input type="text" class="form-control" <?php if(!isset($_COOKIE['username'])){echo 'onKeyUp="checkPostCode()"';}else{echo 'onKeyUp="checkPostCodeOnly()"';}?> name="postcode" required>     
    <span id="error_postcode" class="text-center" style="color:#ff5964;"></span>
    <span id="information" class="text-center fst-italic" style="color:#ff5964;">Certaines informations sont incorrectes. Vous ne pouvez pas valider.</span>
    <button class="bttn-jelly bttn-sm bttn-danger col-5 mt-4 mx-auto" name="addAddressForm" disabled>Suivant</button>
    
    <?php
        if(isset($customer))
        {?>
            <p class="mt-5 text-center">Ou sélectionner l'adresse enregistrée : </p>
            <p class="text-center fw-bold"><?=$customer->get_add1()." ".$customer->get_add2()." ".$customer->get_add3()?></p>
            <button class="bttn-jelly bttn-sm bttn-danger col-5 mt-4 mx-auto" name="addAddressInAccount">Suivant</button>
        <?php
        }

    ?>


</form>

</body>
<script type="text/javascript" src=<?= JS_PATH.'delivery_addresses.js'?>>
    
    
</script>
</html>