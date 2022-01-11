<?php
    session_start();
    
?>

<?php
    require_once(MODELS_PATH.'logins.php');

?>

<?php
    if(isset($_COOKIE['username']))
    {
        header('Location: index.php?action=admin_manager');
    }

?>

<?php

    if(isset($_POST['submit']))
    {
        $loginModel = new LoginsManager(true);
        $loginList = $loginModel->getAllLogins();
        $connectionList = [];
        foreach($loginList as $login)
        {
            $connectionList[$login->get_username()] = $login->get_password();
        }
        
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        
        if(array_key_exists($username, $connectionList))
        {
            if(sha1($password) == $connectionList[$username])
            {
                
                $_SESSION['username'] = $username;
                $_SESSION['customer_id'] = $loginModel->getCustomerIdByUsername($username)->get_customer_id();
                setcookie('username',$_SESSION['username'],time()+3600);
                setcookie('customer_id',$_SESSION['customer_id'],time()+3600);
                header('Location:index.php?action=home');
            }
            else
            {
                $error = "Password incorrect";
            }
        }
        else
        {
            $error = "You don't seem to have an account. You can sign in by clicking here : <a href='index.php?action=signin'>Sign in</a>";
        }

        
    }


?>

<?php
    require_once(VIEWS_PATH.'login.php');

?>