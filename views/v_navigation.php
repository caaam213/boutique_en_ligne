<div>
    <?php
        if(!isset($_COOKIE['username']))
        {?>
            <a class="btn btn-primary" href="index.php?action=login">Se connecter</a>
            <a class="btn btn-secondary" href="index.php?action=signin">S'inscrire</a>
        <?php
        }
        else
        {
        ?>
            <a class="btn btn-primary" href="index.php?action=home&logout=true">Se déconnecter</a>
        <?php
        }
    ?>
    
    <a class="btn btn-success" href="index.php?action=bag">Vos articles : 8, Total : 15.20€</a>
</div>

<?php
    //Display categories list
    foreach($categoriesList as $category)
    {
    ?>
        <a href="index.php?action=home&category=<?=$category->get_id()?>"><?=ucfirst($category->get_name())?></a>
    <?php
    }
?>
