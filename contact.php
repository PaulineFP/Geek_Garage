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
    !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
//    echo "No arguments Provided!";
    //return false;

    //Si donées présentent:
    $name = strip_tags(htmlspecialchars($_POST['name']));
    $subject = 'Nouveau message du site GeekGarage';
    $email_address = strip_tags(htmlspecialchars($_POST['email']));
    $message = strip_tags(htmlspecialchars($_POST['message']));

    //Envoi d'e-mail et réception des informations:
    $to = 'tonmail@mail.com';
    $email_subject = "$subject";
    $email_body = "$message";
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    $headers[] = "From: $name <$email_address>";

    //Affichage d'alerte en fonction de l'envoie du mail:
    if (mail($to, $email_subject, $email_body, implode("\r\n", $headers))) {
        $result = $msgSuccess;
    } else {
        $result = $msgDanger;
    }

}
//----------------------------------------------------------------


//$_COOKIE['flash']['success-activ'] = "Votre compte a bien été validé!";

// Je demande si mes variable sont rempli, si elle le sont pas j affiche mon message d erreur

//if (isset($_POST['name']) && empty($_POST['name'])) {
//
//}
/*
if (isset($_POST['name'])
  ($_POST['email'])
  ($_POST['message'])){
    $result = $success 
   } else if {
    $result = $invalid
    } else {
    $result = $error
    }; 
    */

// et après en html tu met un truc comme ça
/*
if ($result == $success) {
  echo $tonmessagejssuccess;
  } else if ( $result == $invalid) {
  echo $tonmessagejsinvalid;
  } else {
  echo $tonmessageerror;
} */
//header('Location: index.php');
?>

<!<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/Bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
<!--    <META http-equiv="refresh" content="2; URL=index.php">-->

    <title>Validation</title>
</head>
<body>

<?= $result ?>


<?php
//if ($result == $success) {
//echo $msgSucess;
//} else if ( $result == $invalid) {
//echo $tonmessagejsinvalid;
//} else {
//echo $msgDanger;
//} ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>
</html>
