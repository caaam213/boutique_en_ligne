<?php
    $title = "Connexion";
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>

<?php
    if(isset($error))
    {
        echo $error;
    }

?>

<div class="mt-5">
<h1 class="text-center">Espace client</h1>
<center><a class="bttn-stretch bttn-lg bttn-danger text-decoration-none" href="index.php?action=home">Retour</a></center>
<div class="row justify-content-center mt-3">
    <div class="col-md-5 col-10">
            <div class="card bg-light">
                <div class="card-header text-dark" >CONNEXION</div>
                <div class="card-body r">
                    <form action="index.php?action=login" method="post">
                        <label for="username" class="text-dark">Utilisateur</label>
                        <input type="text" class="form-control" name="username" id="name" required>

                        <br/>
                        <label for="password" class="text-dark">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" required>

                        <br/>
                        <center><input type="submit" class="bttn-gradient bttn-lg bttn-danger" name="submit" value="Se connecter"></center>

                    </form>
                </div>
            </div>
    </div>
</div>



</body>
</html>