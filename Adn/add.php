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

    $insert = $pdo->prepare("INSERT INTO centers (namecenter, address, lat, lon, openingt) VALUES ('$namecenter','$address','$latitudes','$longitudes','$openingt')");
    $insert->execute();

    header('Location: index.php');
}
?>

<div class=" d-flex justify-content-center">



<div class="d-flex justify-content-start ">
<form method="post">
    <div class=" pb-5">
        <h1>Ajouter un centre</h1>
    </div>
    <div class="input-group  mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Nom du centre:</span>
        <input type="text" class="form-control border input-group-lg" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Addresse:</span>
        <input type="text" class="form-control border" name="address" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group  mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Horraires:</span>
        <input type="text" class="form-control border" name="openingTimes" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Latitude</span>
        <input type="text" class="form-control border" name="lat" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="input-group  mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default">Longitude</span>
        <input type="text" class="form-control border" name="long" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
    </div>

    <div class="text-center pt-3">
        <button class="btn btn-success me-2" name="form_submit">Ajouter</button>
    </div>

</form>

        <div id="mapid" class="mapadmin ms-5"></div>

</div>
</div>
<!--------------------------------Fichier JS--------------------->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
</script>
<script src="../main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>