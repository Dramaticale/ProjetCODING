<?php

session_start();

if (!isset($_POST['userSearch']) || empty($_POST['userSearch'])) {
    header('Location: statuts.php');
    exit();
}

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$user = $bdd->query("SELECT user.username, user.role, user.statut FROM user WHERE user.username = '{$_POST['userSearch']}'");

$_SESSION['donneesUser'] = $user->fetchall(PDO::FETCH_ASSOC);

header('Location: statuts.php');
exit();