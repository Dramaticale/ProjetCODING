<?php
    session_start();
    require('connexion.php');
    if ($_POST['atq']+$_POST['vie']!=15){
        $_SESSION['erreurPerso'] = 'Veuillez définir 15 points de caractéristiques au total !';
        header('Location:creationPerso.php');
        exit;
    }
    $nom=$_POST['nom'];
    $vie=$_POST['vie'];
    $atq=$_POST['atq'];
    $statement='INSERT INTO perso (nom, vie, atq) VALUES (:nom,:vie,:atq)';
    $requete=$connexion->prepare($statement);
    $requete->execute([
        ':nom'=>$nom, ':vie'=>$vie, ':atq'=>$atq
        ]);
    header('Location:jeu.php');
    exit;
?>