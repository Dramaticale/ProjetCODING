<?php 
    require('connexion.php');
    $statement='SELECT * FROM perso WHERE nom=:nom';
    $requete=$connexion->prepare($statement);
    $requete->execute([':nom'=>$_GET['nom']]);
    echo(json_encode($requete->fetch(PDO::FETCH_OBJ)));
