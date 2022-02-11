<?php
$aDeviner = 150;
require 'header.php';
$errer = null;
$succes = null;
if (isset($_GET['chiffre'])){
    $value = (int)htmlentities($_GET['chiffre']);
    if ($_GET['chiffre'] > $aDeviner){
       $errer = "Votre chiffre est trop grand";
    }elseif ($_GET['chiffre'] < $aDeviner){
        $errer = "Votre chiffre est trop petit";
    }else{
        $succes = "Bravo ! Vous avez deviné le chiffre";
    }
}

?>
<?php if($errer):?>
    <div class="alert alert-danger">
<?= $errer ?>
    </div>
<?php elseif($succes): ?>
    <div class="alert alert-success">
        <?= $succes ?>
    </div>
<?php endif ?>

<form action="/grafikart/jeu.php" method="GET">
    <div class="form-group">
        <input class=" form-control" type="text" name="chiffre" placeholder="entre 0 et 1000" value ="<?= $value ?? ''?>">
    </div>
        <button class="btn btn-primary mt-3" type="submit">Deviner</button>

</form>
<?php require  'footer.php'?>
