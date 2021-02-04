<?php
require 'inc/db.php';
require 'inc/functions.php';
require 'inc/header.php';

logged_only();

$id = $_REQUEST["lign_delete"];

$id = intval($id);

$sql = $pdo->prepare("DELETE FROM `centers` WHERE id = $id");
$sql->execute();

header('Location: index.php');


?>


