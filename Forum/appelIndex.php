<?php

session_start();

if (!isset($_SESSION['check']) || $_SESSION['check'] !== "log") {
    $_SESSION['error'] = "Vous ne pouvez pas accéder au forum sans être connecté";
    header("Location: ../Accueil/index.php");
}

if (!isset($_SESSION['userStatut']) || $_SESSION['userStatut'] === "banni") {
    header("Location: ../Accueil/index.php");
}

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$categorie = $bdd->query("SELECT nom, id FROM categorie ORDER BY id");

$donneesCategorie = $categorie->fetchall(PDO::FETCH_ASSOC);


$sous_categorie = $bdd->query("SELECT sous_categorie.nom, sous_categorie.id, sous_categorie.categorie_id FROM categorie JOIN sous_categorie ON categorie.id = sous_categorie.categorie_id ORDER BY id");

$donneesSous_categorie = $sous_categorie->fetchall(PDO::FETCH_ASSOC);

?>