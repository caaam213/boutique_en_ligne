<?php
    session_start();
    
?>

<?php
    require_once(MODELS_PATH.'admins.php');

?>

<?php
    if(isset($_COOKIE['username']))
    {
        header('Location: index.php?action=admin_manager');
    }

    if(isset($_POST['submit']))
    {
        $adminModel = new AdminsManager(true);
        $adminList = $adminModel->getAllAdmins();
        $connectionList = [];
        foreach($adminList as $admin)
        {
            $connectionList[$admin->get_username()] = $admin->get_password();
        }
        
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        
        if(array_key_exists($username, $connectionList))
        {
            if(sha1($password) == $connectionList[$username])
            {
                
                $_SESSION['username_admin'] = $username;
                setcookie('username_admin',$_SESSION['username_admin'],time()+3600);
                header('Location:index.php?action=admin_manager');
            }
            else
            {
                $error = "Mot de passe incorrect";
            }
        }
        else
        {
            $error = "Ce nom d'utilisateur n'existe pas";
        }

        
    }


?>

<?php
    require_once(VIEWS_PATH.'login_admin.php');

?>