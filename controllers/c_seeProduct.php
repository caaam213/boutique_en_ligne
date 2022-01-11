<?php
    require_once(MODELS_PATH.'reviews.php');
    require_once(MODELS_PATH.'products.php');
    require_once(MODELS_PATH.'categories.php');
?>

<?php
    $productsModel = new ProductsManager(true);
    $reviewsModel = new ReviewsManager(true);
    $categoriesModel = new CategoriesManager(true);

    if(isset($_GET['id']))
    {
        $idProduct = htmlspecialchars($_GET['id']);
        $product = $productsModel->getProductsById($idProduct);
        $category = $categoriesModel->getCategoryById($product->get_cat_id());
        $reviewsList = $reviewsModel->getReviewsByIdProduct($idProduct);
    }
?>

<?php
    require_once(VIEWS_PATH.'productInfo.php');
?>