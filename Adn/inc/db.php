<?php

     $pdo = new PDO('mysql:dbname=paulinef561_geekgarage;host=localhost', 'root', '');
     $pdo->setAttribute( PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

     //Je recupère les valeurs de ma table sous forme d'objet
     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>