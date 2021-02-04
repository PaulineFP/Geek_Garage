<?php
require 'inc/db.php';
require 'inc/functions.php';
require 'inc/header.php';

logged_only();

if (isset($_POST['form_submit'])) {
    $namecenter = $_POST['name'];
    $address = $_POST['address'];
    $latitudes = $_POST['lat'];
    $longitudes = $_POST['long'];
    $openingt = $_POST['openingTimes'];

    $insert = $pdo->prepare("INSERT INTO centers (namecenter, address, latitudes, longitudes, openingt) VALUES ('$namecenter','$address','$latitudes','$longitudes','$openingt')");
    $insert->execute();

    header('Location: account.php');
}
?>


<div class="text-center pb-5">
<h1>Ajouter un centre</h1>
</div>


<form method="post">

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du centre:</span>
        <input type="text" class="form-control border" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Addresse:</span>
        <input type="text" class="form-control border" name="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Horraires:</span>
        <input type="text" class="form-control border" name="openingTimes" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Latitude</span>
        <input type="text" class="form-control border" name="lat" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Longitude</span>
        <input type="text" class="form-control border" name="long" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

        <div class="text-center pt-3">
            <button class="btn btn-success me-2" name="form_submit">Ajouter</button>
        </div>

</form>