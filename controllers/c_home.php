<?php
    session_start();
?>

<?php
    require_once(MODELS_PATH.'products.php');
    require_once(MODELS_PATH.'categories.php');
?>

<?php
    //Log out
    if(isset($_GET['logout']))
    {
        setcookie ("username", "", time() - 3600);
        setcookie('customer_id',"",time()-3600);
        header('Location: index.php?action=home');
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
    }
    
    require_once(VIEWS_PATH.'home.php');
    
?>