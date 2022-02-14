<?php
// checkbox
$parfums = [
        'Fraise' => 4,
    'Vanille'=>3,
    'Chocolat'=> 5
];
//radio
$bases = [
        'Pot'=> 2,
    'Cornet'=>3
];
//checkbox
$supplements = [
        'Pépite de chocolat'=>1,
    'Chantilly' => 0.5
];


require 'header.php';


?>
<div class="container">

<h2>Composer votre glace</h2>
    <br>

<form action="/grafikart/jeu.php" method="POST">

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Bases</h5>
                <div class="card-body">
                    <?= radio($bases, 'base', $_POST);?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Parfums</h5>
                <div class="card-body">
                    <div class="form-group">
                        <?= checkbox($parfums, "parfum", $_POST); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Supplements</h5>
                <div class="card-body">
                    <div class="form-group">
                        <?= checkbox($supplements, "supplement", $_POST); ?>                        </div>
                </div>
            </div>
        </div>
    </div>



        <button class="btn btn-primary mt-3" type="submit">Prix de la glace</button>

</form>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">Tout les ingredients</h5>
                <div class="card-body">
                    <?php
                    if (isset($_POST)){
                        ?>
                        <ul>
                       <?= dataGlace($_POST,$bases)[0] ?? ""; ?>
                       <?= dataGlace($_POST,$bases)[1] ?? ""; ?>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>


</div>
<?php require  'footer.php'?>
