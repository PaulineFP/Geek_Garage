<?php
//https://forums.commentcamarche.net/forum/affich-31814775-afficher-un-message-de-validation-dans-un-formulaire


//Message d'alert:
$msgSuccess = " <div class='alert alert-success alert-dismissible fade show ' role='alert'>
            <strong>Message envoyé</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

$msgDanger = "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Une erreur est survenue lors de l'envoie du message</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";

$result = "";

// Vérification des données:
if (empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['message']) ||
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    echo "No arguments Provided!";
    return false;
}

//Si donées présentent:
$name = strip_tags(htmlspecialchars($_POST['name']));
$subject = 'Nouveau message du site GeekGarage';
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$message = strip_tags(htmlspecialchars($_POST['message']));

//Envoi d'e-mail et réception des informations:
$to = 'p.frare@codeur.online';
$email_subject = "$subject";
$email_body = "$message";
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = "From: $name <$email_address>";
mail($to, $email_subject, $email_body, implode("\r\n", $headers));

//Affichage d'alerte en fonction de l'envoie du mail:
if (mail($to, $email_subject, $email_body, implode("\r\n", $headers))) {
    session_start();
    $_SESSION['flash']['mail_success'] = $msgSuccess;
    header('Location: index.php#contact');
} else {
    $_SESSION['flash']['mail_error'] = $msgDanger;
}

?>
