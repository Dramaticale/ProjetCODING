<?php

session_start();

if (!isset($_SESSION['sous_categorieID']) || empty($_SESSION['sous_categorieID']) || !isset($_SESSION['userID']['id']) || empty($_SESSION['userID']['id'])) {
    header("Location: ../Accueil/index.php");
    exit;
}

$strlen_title = strlen($_POST['topic-title']);

if (!isset($_POST['topic-title']) || empty($_POST['topic-title']) || !isset($_POST['creation-answer']) || empty($_POST['creation-answer'])) {
    $_SESSION['error-creation-topic'] = "Au moins l'un des champs n'est pas rempli.";
    header('Location: ./sous_categorie.php?id=' . $_SESSION['sous_categorieID']);
    exit;
}

if ($strlen_title > 128) {
    $_SESSION['error-creation-topic'] = "La taille maximale d'un titre est de 128 caractères.";
    header('Location: ./sous_categorie.php?id=' . $_SESSION['sous_categorieID']);
    exit;
}

date_default_timezone_set('Europe/Paris');
$datetime = new DateTime();

$date = $datetime->format('Y-m-d H:i:s');
$titre = $_POST['topic-title'];
$message = $_POST['creation-answer'];
$user_id = $_SESSION['userID']['id'];
$sous_categorie_id = $_SESSION['sous_categorieID'];

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt= 'INSERT INTO sujets(sujets.titre, sujets.date_creation, sujets.message, sujets.user_id, sujets.sous_categorie_id) VALUES ("'.$titre.'","'.$date.'","'.$message.'","'.$user_id.'","'.$sous_categorie_id.'")';
$requete = $bdd->query($stmt);

header("Location: ./sous_categorie.php?id=".$_SESSION['sous_categorieID']);