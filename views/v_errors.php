<?php
    $title = "Erreur";
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>
<div class="alert alert-danger w-25 mx-auto mt-3" role="alert">
    <p class="text-center"><?= $error?></p>
    
</div>
<center><a class="bttn-stretch bttn-md bttn-default text-center text-decoration-none" href="index.php?action=home">Retour à l'accueil</a></center>
<center><iframe src="https://giphy.com/embed/3ov9jIDUH1IHp6nAWs" class="mt-5" width="480" height="480" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></center>

<html>

</html>