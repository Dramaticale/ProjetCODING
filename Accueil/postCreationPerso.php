<?php
    session_start();
    require_once 'Model/allModel.php';
    require_once dirname(__DIR__).'\Accueil\Entity\Personnage.php';

    if ($_POST['atq']+$_POST['vie']!=15){
        $_SESSION['erreurPerso'] = 'Veuillez définir 15 points de caractéristiques au total !';
        header('Location:creationPerso.php');
        exit;
    }
    
    $perso = new Personnage();
    $perso->nom = $_POST['name'];
    $perso->vie = $_POST['vie'];
    $perso->atq = $_POST['atq'];

    PersoModel::createPerso($_SESSION['userID']['id'], $perso);
    header('Location:jeu.php');
    exit;
?>