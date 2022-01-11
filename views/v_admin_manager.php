<?php
    $title = "Partie administrateur";
    $styles = array("admin_manager");
    require_once(VIEWS_PATH.'header.php');
?>
<body>
<div class="bg-body">
    <h1 class="text-center">Partie administrateur</h1>
    <div class="d-flex justify-content-evenly">
        <form method="POST" action="index.php?action=admin_manager">
        <?php
            if(!isset($_POST["inProgress"])&&!isset($_POST["all"]))
            {?>
                <button name="inProgress" class="btn btn-dark">Voir commandes payées</button>
            <?php
            }
            else if(isset($_POST["inProgress"]))
            {?>
                <button name="all" class="btn btn-dark">Voir toutes les commandes</button>
            <?php
            }
            else if(isset($_POST["all"]))
            {?>
                <button name="inProgress" class="btn btn-dark">Voir commandes payées</button>
            <?php
            }
            ?>
        <a class="btn btn-danger" href="index.php?action=admin_manager&logout=true">Se déconnecter</a>
        
        </form>
    </div>

    <?php
        if(isset($_POST["inProgress"]))
        {?>
            <h2 class="text-center mt-3">Commandes payées</h2>
        <?php
        }
        else 
        {?>
            <h2 class="text-center mt-3">Toutes les commandes</h2>
        <?php
        }

    ?>

<?php
    require_once(VIEWS_PATH.'listOrders.php');
?>
