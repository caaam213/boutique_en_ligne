<?php
    $title = "Register";
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>
<div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row">

    <h1 class="text-center mt-2">Inscription</h1>
    <center><a class="bttn-stretch bttn-lg bttn-danger text-decoration-none" href="index.php?action=home">Retour</a></center>
    <form class="row mx-auto" style="width:400px;" action="index.php?action=register" method="POST">
    
    <label for="firstname">Prénom</label>
    <input class="form-control col-5" type="text" name="forname" onfocusout="enableButton()" required>
            
    <label for="lastname">Nom</label>
    <input class="form-control col-7" type="text" name="surname" onfocusout="enableButton()" required>

    <label for="phone">N° tel</label>
    <input type="text" class="form-control" onKeyUp="checkPhone()" id="phone" name="phone" required>         
    <span id="error_phone" class="text-center" style="color:#ff5964;"></span>

    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" onKeyUp="checkEmail()" name="email" required>
    <span id="error_email" class="text-center" style="color:#ff5964;"></span>

    <label for="username">Nom d'utilisateur</label>
    <input type="username" class="form-control" id="username" name="username" required>

    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password" onKeyUp="verifyPassword()" required>
    <span id="mdp_error" class="text-center" style="color:#ff5964;"></span>
    
    <label for="password2">Confirmation</label>
    <input type="password" class="form-control" id="password2" onKeyUp="compare()" name="password2" required>
    <span id="mdp2_error" class="text-center" style="color:#ff5964;"></span>
    

    <label for="add1" class="form-label">Adresse 1</label>
    <input type="text" class="form-control" name="add1" onfocusout="enableButton()" required>

    <label for="add2" class="form-label">Complément d'adresse</label>
    <input type="text" class="form-control" name="add2" onfocusout="enableButton()" required>

    <label for="add3" class="form-label">Ville</label>
    <input type="text" class="form-control" name="add3" onfocusout="enableButton()" required>

    <label for="postcode" class="form-label">Code postal</label>
    <input type="text" class="form-control" name="postcode" onKeyUp="checkPostCode()" required>
    <span id="error_postcode" class="text-center" style="color:#ff5964;"></span>
    
    <span id="information" class="text-center fst-italic" style="color:#ff5964;">Certaines informations sont incorrectes. Vous ne pouvez pas valider.</span>
    <button class="bttn-jelly bttn-sm bttn-danger col-5 mt-4 mx-auto" name="register" disabled>S'inscrire</button>
    


</form>
</div>
</body>
<script src=<?= JS_PATH.'register.js'?>>
    
    
</script>