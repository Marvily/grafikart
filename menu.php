<?php
$title = 'Notre menu';
require 'elements/header.php';

$lignes = file(__DIR__.DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."menu.csv");

foreach ($lignes as $k => $ligne){
//    dump(explode("\t",trim($ligne) ));
    $lignes[$k]  = str_getcsv(trim($ligne, " \t\n\r\0\x0B,"));
}
//$lignes = explode(PHP_EOL, $menu);
?>
<div class="container">

    <h1>Menu</h1>
    <?php foreach($lignes as $ligne):?>
        <?php if (count($ligne) == 1): ?>
       <h2> <?=$ligne[0];?></h2>
        <?php else: ?>
            <div class="row">
                <div class="col-md-8">
                    <p>
                        <strong><?=$ligne[0]; ?></strong><br>
                        <?= $ligne[1];?>
                    </p>
                </div>
                <div class="col-md-4">
                    <strong><?= number_format($ligne[2],2,',','');  ?> €</strong>
                </div>
            </div>
        <?php endif;?>
    <?php endforeach; ?>

</div>

<?php require 'elements/footer.php' ?>
