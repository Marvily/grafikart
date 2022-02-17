<?php
$title = "Nous contacter";
require_once 'data/config.php';
require 'elements/header.php';
$heureNow = (int)date("Gi");
$semaine = date('N') -1;

$alertInfo =  in_creneau($heureNow,CRENEAUX,$semaine);
$creneaux = creneaux_html(CRENEAUX, JOURS);
?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8">
                <h1>Nous Contacter</h1>


                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A asperiores consequatur cum delectus dolorem esse labore numquam! Animi ducimus ea, eum ipsam libero nobis numquam quae qui quibusdam unde vero.</span><span>Asperiores at atque aut cumque delectus dolore dolorem dolores eaque eos est et fuga incidunt, ipsam iste iure magni officiis pariatur placeat quaerat quam repudiandae sequi soluta ullam ut velit?</span><span>At cum harum mollitia qui repudiandae, tenetur. Autem beatae consequatur est impedit ipsum, modi molestias nostrum qui quis! Ab accusantium asperiores beatae et eum neque nostrum optio placeat rerum ullam?</span></p>
            </div>
            <div class="col-md-4">

                <h2>Horaires d'ouvertures</h2>
                <?= alert_html($alertInfo); ?>

                <?=  date('l d F Y'); ?>
                <?=  $creneaux ?>
            </div>

            <div class="col-6">
                <h2>Jour de visite</h2>
                <form action="/grafikart/contact.php" method="POST">
                    <div class="form-group">
                        <input type="datetime-local" class="form-control" name="date" value="<?= $_POST['date'] ?? ''?>">
                    </div>

                    <button class="btn btn-primary mt-3" type="submit">Verif d'ouverture</button>

                </form>


            </div>
            <div class="col-6">
                <?php
                if(isset($_POST['date'])){
                    $time = date('Gi',strtotime($_POST['date']));
                    $week = date('N',strtotime($_POST['date']))-1;
                    $alertDispo =  in_creneau($time,CRENEAUX,$week);

                    echo alert_html($alertDispo);
                }
                ?>
            </div>
        </div>


    </div>

    <?php require 'elements/footer.php';?>
