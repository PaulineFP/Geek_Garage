<?php

session_start();

require 'Adn/inc/db.php';

$sql = $pdo->prepare('SELECT namecenter, address, openingt, lat, lon FROM centers');
$sql->execute();
$villes = $sql->fetchAll();

$villes_json = json_encode($villes);



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek_Garage</title>
    <link rel="stylesheet" href="CSS/Bootstrap.css">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css">

</head>

<body>

<div>
    <div class="Banner container-fluid">
        <div class="d-flex justify-content-center">
            <img src="Img/titre.png" class="titre d-flex img-fluid">
        </div>
        <nav class="navbar fixed-top navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#about">Qui sommes nous</a>
                <a class="navbar-brand" href="#services">Prestations</a>
                <img src="Img/LogoBlanc.png">
                <a class="navbar-brand" href="#where">Où nous trouver</a>
                <a class="navbar-brand" href="#contact">Contact</a>
            </div>
        </nav>
    </div>

    <div class="container-fluid bigContainer">

        <div class="about container-sm">

            <div class="d-flex justify-content-center cadre">
                <h2 id="about">Qui sommes nous</h2>
            </div>

            <div class="d-flex container-sm">
                <div class="aboutGroup col-2">
                    <img src="Img/border.png" class="line">
                    <img src="Img/about.jpg" class="ab p-5">
                    <img src="Img/border.png" class="line reverse">
                </div>

                <div class="text ">
                    <p class="lh-base">Lorem ipsum dolor sit amet, consectetur adipiscing
                        elit. Suspendisse quis convallis ligula, non varius
                        orci.Nullam libero neque, accumsan tincidunt mollis
                        tempus, ultricies at dui. Mauris non dictum eros. Duis
                        vulputatenibh libero, ornare suscipit odio sagittis ut.
                        Phasellus in urna mollis, scelerisque purus ut,
                        venenatis libero. Aliquam ornare ante dolor, eu varius
                        justo tincidunt tempor. Sed ligula nisl, aliquet sed
                        vestibulum quis, eleifend vulputate lectus. Vivamus sit
                        amet ante est.Donec eget lacinia elit. Vestibulum
                        rhoncus faucibus urna a dapibus. Fusce vestibulum
                        auctor vehicula. Cubabitur molestie neque urna, eget
                        sollicitudinrisus commodo ultricies. <br>
                        <br>
                        Nulla viverra ex eu quam ornare, vel luctus dolor
                        auctor. Etiam dapibus sem eget nibh maximus,
                        nec rutrum sem.<br>
                        <br>
                        placerat. Nulla id nunc urna. Phasellus at erat eu arcu vehicula ultrices. Nulla tellus
                        elit, congue ut arcu et, hendrerit fringilla urna. Nullam tristique pellentesque
                        vestibulum. Nullam eget metus sem. Suspendisse cursus dignissim justo ut venenatis. </p>
                </div>
            </div>
        </div>

        <div class="services container-sm">

            <div class="d-flex justify-content-center cadre">

                <h2 id="services">Prestations</h2>
            </div>

            <div class="container-sm services d-flex flex-column mb-3">
                <div class="wcontainer d-flex align-self-end order-1">
                    <img src="Img/work.jpg" class="work">
                </div>

                <div class="lcontainer d-flex justify-content-start order-2">
                    <div class="list d-flex justify-content-center">
                        <div>
                            <img src="Img/list.png" class="poster align-self-end ">
                        </div>
                    </div>


                </div>
                <div class="feather d-flex align-self-start order-3">
                    <img src="Img/plume-detouree.png">
                </div>

            </div>

        </div>

        <div class="container-sm">
            <div class="d-flex justify-content-center cadre">

                <h2 id="where">Où nous trouver</h2>
            </div>

            <div class="map d-flex flex-column align-items-center container-ms ">
                <img src="Img/border.png" class="img-map">

                <div id="mymap"></div>
                <img src="Img/border.png" class="map-reverse img-map">

            </div>
        </div>

        <div class="contact container-sm">
                <div class="d-flex  justify-content-center cadre">
                    <h2>Contact</h2>

                </div>

            <?php if (isset($_SESSION['flash'])): ?>
                <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                    <div class="alert alert-<?= $type; ?>">
                        <?= $message; ?>
                    </div>
                <?php endforeach; ?>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>

                <div id="contact" class="formContact d-flex justify-content-center">

                    <div class="form formC">

                        <form  name="Contact" action="contact.php" method="post" >


                            <div class="input-group">
                                <label for="name" class="input-group-text">Nom/Prénom:</label>
                                <input name="name" type="text" class="form-control" id="validationCustom03"
                                       required><br>
                            </div>

                            <div class="input-group">
                                <label for="email" class="input-group-text">E-mail:</label>
                                <input name="email" type="email" class="form-control" id="validationCustomUsername"
                                       aria-describedby="inputGroupPrepend" required><br>
                            </div>
                            <div>
                                <textarea name="message" type="text" resize class="form-control textmedia" id="validationTextarea"
                                          placeholder="Message:" minlength="6"></textarea>
                            </div>
                            <button type="submit" value="Envoyer" class="btn send">Envoyer</button>
                            <!--Ajouter les massages d'erreur en cas de besoin en js-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<footer class="footer ">
    <img src='https://www.onlineformapro.com/wp-content/uploads/2020/01/logo-03.svg' width='8%' alt='Onlineformapro'>
</footer>
<!--------------------------------Fichier JS--------------------->
<script type="text/javascript">

    var lat = 47.61634;
    var lon = 6.14439;
    var carte = null;

    // Fonction d'initialisation de la carte
    function initMap() {

        // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
        carte = L.map('mymap').setView([lat, lon], 11);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(carte);
    }

    window.onload = function () {
        // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
        initMap();

        var villes = <?= $villes_json; ?>

        var tableauMarker = []

        var marqueurs = L.markerClusterGroup();


        // creation de marqueur avec Popup

        for (ville in villes) {
            var marqueur1 =
                L.marker([villes[ville].lat, villes[ville].lon]); //addTo(carte);
            marqueur1.bindPopup("<img src='https://www.onlineformapro.com/wp-content/uploads/2020/01/logo-03.svg' width='20%' alt='Onlineformapro'>" +
                "<br>" +
               "<h3>" + [villes[ville].namecenter] +  "</h3>" + "</br><b>Addresse:</b>" +
                "<br>" +
               "<b>" + [villes[ville].address] + "</b>"+ "</b></br><p>Horraires: </p>" +
               "<p> Du Lundi au Vendredi:" + [villes[ville].openingt] + "</p>" +
                "<br>" +
                "<a  href='#contact' style='margin-top: 5px; color: #ffffff' type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal' onclick=\"document.getElementById('contact_center').value = '" + villes[ville].villes + "';\">Contacter </a>");
            marqueurs.addLayer(marqueur1);

            //On ajoute le marqueur au tableau
            tableauMarker.push(marqueurs);
        }




        //On regroupe les marqueurs dans un groupe lefleat
        var groupe = new L.featureGroup(tableauMarker);

        //On adapte le zoom au groupe
        carte.fitBounds(groupe.getBounds());

        carte.addLayer(marqueurs);
    };
</script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>

<!--    <script src="main.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>