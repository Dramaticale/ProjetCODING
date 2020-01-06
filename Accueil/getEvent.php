<?php 
    require('connexion.php');
    $eventAleatoire1 = mt_rand(1,3);
    $afficherEvent1 = 'SELECT texte FROM evennement WHERE id='.$eventAleatoire1.' AND niveau=1';
    $requete = $connexion->query($afficherEvent1);
    $requete->execute();
    $data=$requete->fetch(PDO::FETCH_ASSOC);
?>