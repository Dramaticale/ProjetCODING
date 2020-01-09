<?php
    require('connexion.php');
    $nom=$_POST['nom'];
    $statement='INSERT INTO perso (nom, vie, atq) VALUES (:nom,15,100)';
    $requete=$connexion->prepare($statement);
    $requete->execute([':nom'=>$nom]);
    header('Location:jeu.php');
    exit;
?>