<?php
    session_start();
    $idSession = uniqid((double)microtime()*1000000, true);
    if(!isset($_SESSION['id']))
    {
        $_SESSION['id'] = $idSession;
        
    }
    
?>

<?php
require_once(MODELS_PATH.'orders.php');
    require_once(MODELS_PATH.'products.php');
    require_once(MODELS_PATH.'categories.php');
    require_once(MODELS_PATH.'ordersItem.php');
    $orderModel = new OrderManager(true);


?>

<?php
    //Log out
    if(isset($_GET['logout']))
    {
        $orderModel = new OrderManager(true);
        $orderModel->deleteOrder($_SESSION["SESS_ORDERNUM"]);
        setcookie ("username", "", time() - 3600);
        setcookie('customer_id',"",time()-3600);
        header('Location: index.php?action=home');
        $_SESSION = array();
    }

    //Get all categories
    $categoriesModel = new CategoriesManager(true);
    $categoriesList = $categoriesModel->getAllCategories();

    //List products by category
    $productsModel = new ProductsManager(true);
    if(isset($_GET['category']))
    {
        $cat_id = htmlspecialchars($_GET['category']);
        $listProducts = $productsModel->getProductsByCategory($cat_id);
        if(sizeof($listProducts) == 0)
        {
            //In case of the user change the url
            $error = "This category does not exist";
        }
        $cat= $categoriesModel->getCategoryById($cat_id);
    }

    
    
    
    
    require_once(VIEWS_PATH.'home.php');
    
?>