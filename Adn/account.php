<?php
require 'inc/functions.php';
require 'inc/db.php';
logged_only();

$sql = $pdo->prepare('SELECT * FROM centers');
$sql->execute();
$centers = $sql->fetchAll();

?>

<?php require 'inc/header.php'?>

<div class="text-center pb-5">
<h1>Espace Administrateur</h1>
</div>

<div class="container">

    <div class="row align-items-start">

        <div class="col-3 bg-light p-3  ms-2 border">
            <h4>Centres de réparation:</h4>
        </div>

        <div class="col ">
           <a href="add.php">
               <button class="btn btn-success" >Ajouter un centre</button>
           </a>
        </div>

    </div>

    <?php foreach ($centers as $item):?>

    <div class="col-sm-9 bg-light p-3 border">

        <div class="row align-items-start">

            <div class="col">
                <h4><?= $item['namecenter'] ?></h4>
                <b>Adresse: <?= $item['address'] ?></b>
                <p>Lundi au Vendredi: <?= $item['openingt']?>,
                </br>Samedi-Dimanche: Fermé</p>
            </div>

            <div class="col d-flex justify-content-end"">
            <a href="/GeekGarage/Adn/edit.php?lign_update=<?= intval($item['id']) ?>">
                <button class="btn btn-primary me-2">Modifier</button>
            </a>
            <a href="/GeekGarage/Adn/delete.php?lign_delete=<?= intval($item['id']) ?>">
                <button class="btn btn-danger">Suprimer</button>
            </a>

            </div>

        </div>
    </div>
    <?php endforeach; ?>

</div>


</body>
</html>
