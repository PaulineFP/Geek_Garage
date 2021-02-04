<?php
require 'inc/db.php';
require_once 'inc/functions.php';

logged_only();

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!empty($_POST)){

    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9]+$/', $_POST['username'])){
        $errors['username'] = "Votre pseudo n'est pas valide.";
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
        $req->execute([$_POST['username']]);
        $user = $req->fetch();
        if($user){
            $errors['username'] = 'Ce pseudo est déjà pris';
        }
    }

    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide.";
    } else {
        $req = $pdo->prepare('SELECT id FROM users WHERE email= ?');
        $req->execute([$_POST['email']]);
        $user = $req->fetch();
        if ($user) {
            $errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
        }
    }

    if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] = "Vous devez rentrer un mot de passe valide.";
    }


    //Les informations se rempliront a condition que $errors soit vide
    if(empty($errors)){

        //Pour évité que l'utilisateur rentre n'importe quoi

        $req = $pdo->prepare("INSERT INTO users SET username =?, password = ?, email = ?, confirmation_token = ?");

        //Par sécurité, je cyrpte les données du password
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $token = str_random(60);
        $req->execute([$_POST['username'], $password, $_POST['email'], $token]);

        $user_id = $pdo->lastInsertId();

        //confirmation par email
        mail($_POST['email'],
'Confirmation de votre compte',
"Afin de valider votre compte merci de cliquer sur ce lien\n\n http://localhost/GeekGarage/Adn/confirm.php?id=$user_id&token=$token");
        $_SESSION['flash']['success'] = 'un email de confirmation vous a été envoyé pour valider votre compte';
        header('location: login.php');
        exit();
    }

}

?>
<?php require 'inc/header.php'?>
<div class="text-center">
<main class="form-signin">
<h1>S'inscrire</h1>

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

<form action="" method="post">
    <div class="form-group">

        <label for="">Pseudo</label>
        <input type="text" name="username" class="form-control" />

    </div>

    <div class="form-group">

        <label for="">Email</label>
        <input type="text" name="email" class="form-control" />

    </div>

    <div class="form-group">

        <label for="">Mot de passe</label>
        <input type="password" name="password" class="form-control" />

    </div>

    <div class="form-group">

        <label for="">confrimez votre mot de passe </label>
        <input type="password" name="password_confirm" class="form-control mb-3" />

    </div>

    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>
</main>
</div>
</body>
</html>
