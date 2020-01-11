<?php 

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sujets = $bdd->query("SELECT sujets.id, sujets.titre, sujets.date_creation, sujets.sous_categorie_id FROM sous_categorie JOIN sujets ON sous_categorie.id = sujets.sous_categorie_id WHERE sujets.sous_categorie_id = {$_GET['id']} ORDER BY sujets.date_creation DESC");

$donneesSujets = $sujets->fetchall(PDO::FETCH_ASSOC);

$sous_categorie = $bdd->query("SELECT sous_categorie.nom FROM sous_categorie WHERE sous_categorie.id = {$_GET['id']}");

$donneesSous_categorie = $sous_categorie->fetchall(PDO::FETCH_ASSOC);

if (!isset($_SESSION['error-creation-topic'])) {
    $_SESSION['error-creation-topic'] = '';
}

?>