<?php
    $title = "Paiement";

    require_once(VIEWS_PATH.'header.php');
?>
<body style="overflow-x: hidden;color:white !important;" class="bg-secondary">
<?php require_once(VIEWS_PATH.'navbar.php'); ?>
<div class="text-center mt-1">
  <img src=<?= OTHER_IMAGES."payment.png"?> class="img-fluid" alt="...">
</div>
<div class="mt-5"></div>
<center><a class="bttn-stretch bttn-lg bttn-danger text-decoration-none" href="index.php?action=addressesChoice">Retour</a>
<h1 class="text-center">Choix de paiement</h1>
<p class="text-center fst-italic">Etape 2 sur 3</p>
<p class="fw-bold">Total : <?=$order->get_total()?> €</p>

<form action="index.php?action=payment" method="POST">

<button class="bttn-pill bttn-lg bttn-primary" name="paypal">Par Paypal</button>

<button class="bttn-pill bttn-lg bttn-warning" name="cheque">Par cheque</button>
</form>
</body>
</html>