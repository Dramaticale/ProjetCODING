<?php 

session_start();

if (!isset($_SESSION['donneesUserKeep'][0]['statut']) || !isset($_SESSION['donneesUserKeep'][0]['role']) || !isset($_SESSION['donneesUserKeep'][0]['username']) || empty($_SESSION['donneesUserKeep'][0]['statut']) || empty($_SESSION['donneesUserKeep'][0]['role']) || empty($_SESSION['donneesUserKeep'][0]['username'])) {
    header('Location : index.php');
    exit;
}

if ($_SESSION['userStatut'] === "banni" && $_SESSION['userRole'] !== "admin") {
    header('Location : index.php');
    exit;
}

if ($_SESSION['userRole'] !== "modo" && $_SESSION['userRole'] !== "admin") {
    header('Location : index.php');
    exit;
}

$bdd = new PDO('mysql:host=localhost; dbname=projetcoding; charset=utf8;', 'root', NULL);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST['statut'] !== $_SESSION['donneesUserKeep'][0]['statut']) {
    
    $stmt= "UPDATE user SET user.statut = '{$_POST['statut']}' WHERE user.username = '{$_SESSION['donneesUserKeep'][0]['username']}'";
    $requete = $bdd->query($stmt);

}

if ($_POST['role'] !== $_SESSION['donneesUserKeep'][0]['role'] && $_SESSION['userRole'] === "admin") {

    $stmt= "UPDATE user SET user.role = '{$_POST['role']}' WHERE user.username = '{$_SESSION['donneesUserKeep'][0]['username']}'";
    $requete = $bdd->query($stmt);

}

header('Location: statuts.php');
exit();