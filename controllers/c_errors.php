<?php
    $errorsList = array(
    0 => "Page inconnue"
    );
    if(isset($_GET['type']))
    {
        $type = htmlspecialchars($_GET['type']);
        if(!array_key_exists($type, $errorsList))
        {
            $error = "Erreur inconnue";
        }
        else
        {
            $error = $errorsList[$type];
        }
    }
    else 
    {
        $error = "Erreur inconnue";
    }


?>

<?php require_once(VIEWS_PATH.'errors.php')?>