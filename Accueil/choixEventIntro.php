<?php
    require('connexion.php');
    $afficherChoix1EventIntro = 'SELECT nom FROM choix WHERE id=1';
    $afficherChoix2EventIntro = 'SELECT nom FROM choix WHERE id=2';
    $requete = $connexion->query($afficherChoix1EventIntro);
    $requete2 = $connexion->query($afficherChoix2EventIntro);
    $requete->execute();
    $requete2->execute();
    $data=$requete->fetch(PDO::FETCH_ASSOC);
    $data2=$requete2->fetch(PDO::FETCH_ASSOC);
?>