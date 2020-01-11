<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$categorie = $bdd->query('SELECT nom, id FROM categorie ORDER BY id');

$donneesCategorie = $categorie->fetchall(PDO::FETCH_ASSOC);


$sous_categorie = $bdd->query('SELECT sous_categorie.nom, sous_categorie.id, sous_categorie.categorie_id FROM categorie JOIN sous_categorie ON categorie.id = sous_categorie.categorie_id ORDER BY id');

$donneesSous_categorie = $sous_categorie->fetchall(PDO::FETCH_ASSOC);

?>