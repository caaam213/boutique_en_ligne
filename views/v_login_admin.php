<?php
    $title = "Partie Administrateur";
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;" class="bg-light">
<?php
    if(isset($error))
    {
        echo $error;
    }

?>
<div class="mt-5">
<h1 class="text-center">Espace administrateur</h1>
<center><a class="bttn-stretch bttn-lg bttn-royal text-decoration-none" href="index.php?action=home">Retour</a></center>
<div class="row justify-content-center mt-3">
    <div class="col-md-5 col-10">
        <div class="card">
            <div class="card-header">CONNEXION</div>
            <div class="card-body">
                <form class="form-horizontal" action="index.php?action=admin" method="post">

                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control" name="username" id="name" required>

                        <br/>
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" name="password" id="password" required>

                        <br/>
                        <center><input type="submit" class="bttn-gradient bttn-lg bttn-royal" name="submit" value="Se connecter"></center>

                </form>
            </div>
        </div>
    </div>
</div>
</div>

</body>
</html>