<?php 

session_start();

if (!isset($_SESSION['IDsujet']) || empty($_SESSION['IDsujet']) || !isset($_SESSION['userID']['id']) || empty($_SESSION['userID']['id'])) {
    header("Location: ../Accueil/index.php");
    exit;
}

if (!isset($_POST['answer']) || empty($_POST['answer'])) {
    $_SESSION['errorAnswer'] = 'Vous ne pouvez pas envoyer une réponse vide';
    header("Location: ./sujet.php?id=".$_SESSION['IDsujet']);
    exit;
}

date_default_timezone_set('Europe/Paris');
$datetime = new DateTime();

$date = $datetime->format('Y-m-d H:i:s');
$texte = htmlspecialchars($_POST['answer']);
$sujetID = $_SESSION['IDsujet'];
$userID = $_SESSION['userID']['id'];

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt= 'INSERT INTO commentaire(commentaire.texte, commentaire.date, commentaire.sujets_id, commentaire.user_id) VALUES ("'.$texte.'","'.$date.'","'.$sujetID.'","'.$userID.'")';
$requete = $bdd->query($stmt);

header("Location: ./sujet.php?id=".$_SESSION['IDsujet']);
exit;