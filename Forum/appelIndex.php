<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$categorie = $bdd->query('SELECT nom FROM categorie');

$donneesCategorie = $categorie->fetchall(PDO::FETCH_ASSOC);


$nomsCategorie = [];
foreach ($donneesCategorie as $donneeCategorie) {

    $sous_categorie = $bdd->query('SELECT sous_categorie.nom, sous_categorie.id FROM categorie JOIN sous_categorie ON categorie.id = sous_categorie.categorie_id');

    $donneesSous_categorie = $sous_categorie->fetchall(PDO::FETCH_ASSOC);

    die(var_dump($donneesSous_categorie));

}

?>