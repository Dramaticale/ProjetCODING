<?php

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$messages = $bdd->query("SELECT texte, auteur, dateMessage FROM messages WHERE sujet='{$_GET["sujet"]}' AND section='{$_GET["section"]}' ORDER BY dateMessage");

$donneesMessages = $messages->fetchall(PDO::FETCH_ASSOC);

$tableauMessages = [];

foreach ($donneesMessages as $donneesMessage) {
    array_push($tableauMessages, $donneesMessage);
}

$titreSujet = $bdd->query("SELECT titre FROM sujets WHERE slug='{$_GET["sujet"]}'");

$sujet = $titreSujet->fetchall(PDO::FETCH_ASSOC);

?>