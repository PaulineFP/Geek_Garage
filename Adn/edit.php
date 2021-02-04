<?php
require 'inc/db.php';
require 'inc/functions.php';
require 'inc/header.php';

logged_only();

$id = $_GET["lign_update"];

$id = intval($id);

$sql = $pdo->prepare("SELECT * FROM centers WHERE id = '$id'");
$sql->execute();
$centers = $sql->fetch();

//Pour faire fonctionner le btn je verifie les champs
if(isset($_POST['btn-update'])){
    $namecenter = $_POST['name'];
    $address = $_POST['address'];
    $latitudes = $_POST['lat'];
    $longitudes = $_POST['long'];
    $openingt = $_POST['openingTimes'];

    $update = $pdo->prepare("UPDATE centers SET namecenter='$namecenter', address='$address', lat='$latitudes', lon='$longitudes', openingt='$openingt' WHERE id = '$id'");
    $update->execute();

    header('Location: index.php');
}
?>

<div class="text-center pb-5">
    <h1>Modifier un centre</h1>
</div>

<form method="post">

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du centre:</span>
        <input type="text" class="form-control border" name="name" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"  value="<?= $centers['namecenter'] ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Adresse:</span>
        <input type="text" class="form-control border" name="openingTimes" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"  value="<?= $centers['address'] ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Horraires:</span>
        <input type="text" class="form-control border" name="openingTimes" aria-label="Sizing example input"
               aria-describedby="inputGroup-sizing-default"  value="<?= $centers['openingt'] ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Latitude</span>
        <input type="text" class="form-control border" name="lat"
               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
               value="<?= $centers['lat'] ?>">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Longitude</span>
        <input type="text" class="form-control border" name="long"
               aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"
               value="<?= $centers ['lon'] ?>">
    </div>

    <div class="text-center pt-3">
        <button class="btn btn-primary me-2" name="btn-update">Modifier</button>
    </div>

</form>