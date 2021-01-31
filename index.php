<?php

session_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek_Garage</title>
    <link rel="stylesheet" href="css/Bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />

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

                <div class="d-flex justify-content-center">

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

                <div class="d-flex justify-content-center">

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
                <div class="d-flex justify-content-center ">

                    <h2 id="where">Où nous trouver</h2>
                </div>

                <div class="map d-flex flex-column align-items-center container-ms ">
                    <img src="Img/border.png">

                    <div id="mapid"></div>

                    <img src="Img/border.png" class="map-reverse">
                </div>
            </div>

            <div class="contact container-sm">
                <div class="d-flex  justify-content-center">
                    <h2 id="contact">Contact</h2>
                    
                </div>

                <?php if (isset($msgDanger)) echo $msgDanger ; else ""; ?>
                <?php if (isset($msgSuccess)) echo $msgSuccess; else ""; ?>

                <!--alert success-->
               <!-- <div class="alert alert-success alert-dismissible fade show " role="alert">
                    <strong>Message envoyé</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>-->
                <!--alert invalide-->
                <!--<div class=" alert-form alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Formulaire incorrect</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>-->
                <!--alert  erreur envoie-->
                <!--<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Une erreur est survenue lors de l'envoie du message</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>-->

                <div class="formContact d-flex justify-content-center">

                    <div class="form mb-3">
                        
                        <form name="Contact" action="contact.php" method="POST" onsubmit="return validateForm()">
                           
                            
                            <div class="input-group">
                                <label for="name" class="input-group-text">Nom/Prénom:</label>
                                <input name="name" type="text" class="form-control" id="validationCustom03" required><br>
                            </div>
                           
                            <div class="input-group">
                                <label for="email" class="input-group-text">E-mail:</label>
                                <input name="email" type="email"  class="form-control" id="validationCustomUsername"
                                       aria-describedby="inputGroupPrepend" required><br>
                            </div>
                            <div>
                                <textarea name="message" type="text" resize  class="form-control" id="validationTextarea" 
                                  placeholder="Message:" minlength="6"></textarea>
                           </div>
                            <button type="submit" value="Envoyer" class="btn send">Envoyer </button>
                             <!--Ajouter les massages d'erreur en cas de besoin en js-->
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <footer class="footer ">
        <p>&copy 2021 - Onlineformapro</p>
    </footer>
    <!--------------------------------Fichier JS--------------------->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin="">
    </script>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
            crossorigin="anonymous"></script>
</body>

</html>