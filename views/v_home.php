<?php
    $title = "Home";
    $style = "style";
    require_once(VIEWS_PATH.'header.php');
?>
<h1>Home</h1>

<?php
    if(isset($_COOKIE['username']))
    {
        echo 'Bienvenue '.$_COOKIE['username'].'!';
    }

?>

<?php
    require_once(VIEWS_PATH.'navigation.php'); 
?>


<?php
    //Display products list by their categories
    if(isset($listProducts))
    {
        if(sizeof($listProducts) != 0)
        {
            require_once(VIEWS_PATH.'listProducts.php'); 
        }
        else
        {
            echo $error;
        }
            
    
    }


?>









</body>
</html>
