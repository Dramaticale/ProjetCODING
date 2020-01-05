<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$categories = $bdd->query('SELECT nom FROM catégories');

$donneesCategories = $categories->fetchall(PDO::FETCH_ASSOC);

$nomsCategories = [];

foreach ($donneesCategories as $donneeCategories) {
    array_push($nomsCategories, $donneeCategories['nom']);
}

foreach ($nomsCategories as $nomCategories) {
    $nomsSections[$nomCategories] = [];

    $sections = $bdd->query("SELECT nom FROM sections WHERE catégorie = '".$nomCategories."'");

    $donneesSections = $sections->fetchall(PDO::FETCH_ASSOC);

    foreach ($donneesSections as $donneeSections) {
        array_push($nomsSections[$nomCategories], $donneeSections['nom']);
    }
}

?>
