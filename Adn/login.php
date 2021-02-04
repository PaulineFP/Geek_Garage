<?php
session_start();
require ('inc/db.php');

if (!empty($_POST) && !empty($_POST['username']) && !empty($_POST['password'])) {
    require ('inc/db.php');
    $req = $pdo->prepare("SELECT * FROM users WHERE username = :username  AND confirmed_at IS NOT NULL");
    $req->execute(['username' => $_POST['username']]);
    $user = $req->fetch(PDO::FETCH_OBJ);
    if ($user && password_verify($_POST['password'], $user->password)) {
        session_start();
        $_SESSION['auth'] = $user;
        $_SESSION['flash']['success'] = 'Vous êtes maintenant bien connecter !';
        header('Location: index.php');
    } else {
        $_SESSION['flash']['danger'] = 'Vos identifiants sont incorrect !';
    }
}

?>

<?php require 'inc/functions.php';?>
<?php require 'inc/header.php'?>

<div class="text-center">
<?php if(!empty($errors)): ?>
    <div class="alert alert-<?= $type; ?>">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <?php foreach($errors as $error):?>
        <ul>
            <li><?= $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<main class="form-signin">

    <form action="" method="post">
        <h1 class="h3 mb-3 fw-normal">Connection à l'espace administrateur</h1>

        <label for="" class="visually-hidden">username ou email</label>
        <input type="text" name="username" class="form-control" placeholder="username ou email" />


        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" id="inputPassword" class="form-control"  name="password" placeholder="Mot de passe" required>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
    </form>
</main>
</div>
</div>

</body>
</html>

