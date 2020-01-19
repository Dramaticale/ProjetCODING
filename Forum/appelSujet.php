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

$sujets = $bdd->query("SELECT sujets.id, sujets.titre, sujets.date_creation, sujets.message, sujets.user_id, sujets.sous_categorie_id FROM sujets JOIN user ON sujets.user_id = user.id JOIN sous_categorie on sujets.sous_categorie_id = sous_categorie.id WHERE sujets.id = {$_GET['id']}");

$donneesSujets = $sujets->fetchall(PDO::FETCH_ASSOC);

$commentaires = $bdd->query("SELECT commentaire.id, commentaire.texte, commentaire.date, commentaire.user_id FROM commentaire JOIN user ON commentaire.user_id = user.id JOIN sujets ON commentaire.sujets_id = sujets.id WHERE commentaire.sujets_id = {$_GET['id']} ORDER BY commentaire.date");

$donneesCommentaires = $commentaires->fetchall(PDO::FETCH_ASSOC);

$auteur = $bdd->query("SELECT user.username FROM user WHERE user.id = {$donneesSujets[0]['user_id']}");

$nomAuteur = $auteur->fetchall(PDO::FETCH_ASSOC);

$resultat_dateheure = explode(' ', $donneesSujets[0]['date_creation']);
$resultat_date = explode('-', $resultat_dateheure[0]);
$resultat_heure = explode(':', $resultat_dateheure[1]);

if (!isset($_SESSION['errorAnswer'])) {
    $_SESSION['errorAnswer'] = '';
}

?>