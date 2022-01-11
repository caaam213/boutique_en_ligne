<?php
    require_once("configuration/configuration.php");
?>

<?php
    if(isset($_GET["action"]))
    {
        $controller = htmlspecialchars($_GET["action"]); //Enable to avoid security breach such as SQL injection attacks
    }
    else
    {
        header('Location: index.php?action=home');
    }
    $file = CONTROLLERS_PATH.$controller.'.php';
    if(is_file($file))
    {
        require_once($file);
    }
    else
    {
        header('Location: index.php?action=errors');
    }
    


?>