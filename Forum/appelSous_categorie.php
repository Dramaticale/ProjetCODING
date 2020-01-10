<?php 

session_start();

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sujets = $bdd->query("SELECT titre, slug, dateLastMessage FROM sujets WHERE section='".$_GET['section']."' ORDER BY dateLastMessage");

$donneesSujets = $sujets->fetchall(PDO::FETCH_ASSOC);

$nomsSujets = [];

foreach ($donneesSujets as $donneeSujets) {
    array_push($nomsSujets, $donneeSujets);
}

$date = [];
$i = 0;

foreach ($nomsSujets as $nomSujets) {

    $resultat_dateheure = explode(' ', $nomSujets['dateLastMessage']);
    $resultat_date = explode('-', $resultat_dateheure[0]);
    $resultat_heure = explode(':', $resultat_dateheure[1]);

    $dateTexte = $resultat_date[2] . "/" . $resultat_date[1] . "/" . $resultat_date[0] . " à " . $resultat_heure[0] . ":" . $resultat_heure[1];

    array_push($date ,$dateTexte);

}

if (!isset($_SESSION['error-creation-topic'])) {
    $_SESSION['error-creation-topic'] = '';
}

?>