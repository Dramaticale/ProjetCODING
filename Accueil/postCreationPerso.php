<?php
    session_start();
    require_once 'Model/allModel.php';
    require_once dirname(__DIR__).'\Accueil\Entity\Personnage.php';

    $perso = new Personnage();
    $perso->nom = $_POST['name'];
    $perso->vie = $_POST['vie'];
    $perso->atq = $_POST['atq'];

    PersoModel::createPerso($_SESSION['userID']['id'], $perso);
    header('Location:jeu.php');
    exit;
?>