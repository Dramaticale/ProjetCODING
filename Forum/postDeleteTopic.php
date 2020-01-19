<?php

session_start();

if ($_SESSION['userStatut'] === "banni" && $_SESSION['userRole'] !== "admin") {
    header('Location : index.php');
    exit;
}

if ($_SESSION['userRole'] !== "modo" && $_SESSION['userRole'] !== "admin") {
    header('Location : index.php');
    exit;
}

if (!ctype_digit($_GET["id"])) {
    header("Location: sujet.php?id=".$_SESSION['IDsujet']);
    exit;
}

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt= "DELETE FROM commentaire WHERE commentaire.sujets_id = {$_GET["id"]}";
$requete = $bdd->query($stmt);

$stmt= "DELETE FROM sujets WHERE sujets.id = {$_GET["id"]}";
$requete = $bdd->query($stmt);

header("Location: sous_categorie.php?id=".$_SESSION['IDsous_categorie']);