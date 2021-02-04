<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conection</title>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="../css/signin.css" >
    <link rel="stylesheet" href="../css/Bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
</head>
<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">

                    <li class="nav-item active">
                        <a class="nav-link" aria-current="page" href="../index.php">Retour au site</a>
                    </li>

                    <?php if (isset($_SESSION['auth'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Se déconnecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">S'inscrire</a>
                    </li>
                    <?php else:?>

                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Se connecter</a>
                    </li>
                    <?php endif;?>
                </ul>

            </div>
</header>
<body>
<div class="container">

<!--message d'erreur-->

    <?php if(isset($_SESSION['flash'])):?>

        <?php foreach($_SESSION['flash'] as $type => $message):?>

        <div class="alert-<?= $type; ?>">
            <?= $message; ?>
        </div>

        <?php endforeach; ?>

<!--Ensuite je supprime le message d'erreur-->

        <?php unset($_SESSION['flash']); ?>

    <?php endif; ?>

