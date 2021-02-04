<?php

require 'db.php';


function str_random($lenght){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    //je le mélange en 60 pour avoir la possibilité d avoir plusieurs fois le même caractère
    return substr(str_shuffle(str_repeat($alphabet, $lenght)), 0, $lenght);
}

//Je vérifie que l'utilisateur est bien connecté:
function logged_only(){

    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    if(!isset($_SESSION['auth'])){

        $_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'acceder à cette page.";

        header('Location: login.php');

        exit();
    }

}