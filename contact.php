<?php

//vérification des données:
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_add = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));


//Envoi d'e-mail et réception des informations:
$to = '';
$email_subject = "Contact: $name";
$email_body = "Vous avez reçu un nouveau message depuis le formulaire de contact de votre portfolio.\n\n"."Voici les détails:\n\nName: $name\n\nEmail:$email_add\n\nObjet:$object\n\nMessage:$message";
$headers = "From: noreply-\n";
$headers = "Répondre à : $email_add";
mail($to,$email_subject,$email_body,$headers);
return true;

?>