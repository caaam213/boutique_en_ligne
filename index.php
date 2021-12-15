<?php
    require_once("configuration/configuration.php");
?>

<?php
    if(isset($_GET["action"]))
    {
        $action = htmlspecialchars($_GET["action"]); //Enable to avoid security breach such as SQL injection attacks
        if($action == 'home')
        {
            $controller = 'home';
        }
        else if($action == 'login')
        {
            $controller = 'login';
        }
    }
    else
    {
        header('Location: index.php?action=home');
    }

    require_once(CONTROLLERS_PATH.$controller.'.php');


?>