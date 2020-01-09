<?php
    require('connexion.php');
//On récupère le nom de l'action dans la BDD
    $afficherChoixEpee = 'SELECT nom FROM choix WHERE id=1';
    $afficherChoixBouclier = 'SELECT nom FROM choix WHERE id=2';
    $afficherChoixRencontre = 'SELECT nom FROM choix WHERE id=3';
    $afficherChoixPasserChemin = 'SELECT nom FROM choix WHERE id=4';
    $afficherChoixCombattre = 'SELECT nom FROM choix WHERE id=5';
    $afficherChoixFuir = 'SELECT nom FROM choix WHERE id=6';
    $afficherChoixOuvrir = 'SELECT nom FROM choix WHERE id=7';
    $afficherChoixNePasOuvrir = 'SELECT nom FROM choix WHERE id=8';

//On se connecte à la BDD et on lui affecte la requète
    $requeteEventIntro = $connexion->query($afficherChoixEpee);
    $requete2EventIntro = $connexion->query($afficherChoixBouclier);
    $requeteEvent1 = $connexion->query($afficherChoixRencontre);
    $requete2Event1 = $connexion->query($afficherChoixPasserChemin);
    $requete3Event1 = $connexion->query($afficherChoixCombattre);
    $requete4Event1 = $connexion->query($afficherChoixFuir);
    $requete5Event1 = $connexion->query($afficherChoixOuvrir);
    $requete6Event1 = $connexion->query($afficherChoixNePasOuvrir);

//On exécute la requète
    $requeteEventIntro->execute();
    $requete2EventIntro->execute();
    $requeteEvent1->execute();
    $requete2Event1->execute();
    $requete3Event1->execute();
    $requete4Event1->execute();
    $requete5Event1->execute();
    $requete6Event1->execute();

//On met dans un tableau les résultats des requètes
    $dataEpee=$requeteEventIntro->fetch(PDO::FETCH_ASSOC);
    $dataBouclier=$requete2EventIntro->fetch(PDO::FETCH_ASSOC);
    $dataRencontre=$requeteEvent1->fetch(PDO::FETCH_ASSOC);
    $dataPasserChemin=$requete2Event1->fetch(PDO::FETCH_ASSOC);
    $dataCombattre=$requete3Event1->fetch(PDO::FETCH_ASSOC);
    $dataFuir=$requete4Event1->fetch(PDO::FETCH_ASSOC);
    $dataOuvrir=$requete5Event1->fetch(PDO::FETCH_ASSOC);
    $dataNePasOuvrir=$requete6Event1->fetch(PDO::FETCH_ASSOC);
?>