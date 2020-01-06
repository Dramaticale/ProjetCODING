<?php 

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sujets = $bdd->query("SELECT titre, slug FROM sujets WHERE section='".$_GET['section']."'");

$donneesSujets = $sujets->fetchall(PDO::FETCH_ASSOC);

$nomsSujets = [];

foreach ($donneesSujets as $donneeSujets) {
    array_push($nomsSujets, $donneeSujets);
}

?>