<?php
    session_start();
    
?>

<?php
    require_once(MODELS_PATH.'customers.php');
    require_once(MODELS_PATH.'logins.php');
?>

<?php
    if(isset($_COOKIE['username']))
    {
        header('Location: index.php?action=home');
    }
    else
    {
        $loginModel = new LoginsManager(true);
        $customerModel = new CustomerManager(true);
        $loginList = $loginModel->getAllLogins();
        
        $connectionList = [];
        
        foreach($loginList as $login)
        {
            $connectionList[] = $login->get_username();
        }
    }

    if(isset($_POST['register']))
    {
        if(in_array($_POST['username'],$connectionList))
        {
            $erreur = "Ce nom d'utilisateur existe déjà";
        }
        else
        {
            $forname = htmlspecialchars($_POST['forname']);
            $surname = htmlspecialchars($_POST['surname']);
            $add1 = htmlspecialchars($_POST['add1']);
            $add2 = htmlspecialchars($_POST['add2']);
            $add3 = htmlspecialchars($_POST['add3']);
            $postcode = htmlspecialchars($_POST['postcode']);
            $phone = htmlspecialchars($_POST['phone']);
            $email = htmlspecialchars($_POST['email']);
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);

            $customerModel->addCustomer($forname, $surname, $add1, $add2, $add3, $postcode, $phone, $email);
            $lastId = Connection::getInstance()->getDb()->lastInsertId();
            $_SESSION['username'] = $username;
            $_SESSION['customer_id'] = $loginModel->getCustomerIdByUsername($username)->get_customer_id();
            setcookie('username',$_SESSION['username'],time()+3600);
            setcookie('customer_id',$_SESSION['customer_id'],time()+3600);
            $loginModel->addLogin($lastId, $username, sha1($password));
            header('Location: index.php?action=home');
        }

    }



?>

<?php
    require_once(VIEWS_PATH.'register.php');

?>