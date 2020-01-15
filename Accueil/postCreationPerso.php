<?php
    session_start();
    require_once 'Model/allModel.php';

    if ($_POST['atq']+$_POST['vie']!=15){
        $_SESSION['erreurPerso'] = 'Veuillez définir 15 points de caractéristiques au total !';
        header('Location:creationPerso.php');
        exit;
    }
    $nom=$_POST['nom'];
    $vie=$_POST['vie'];
    $atq=$_POST['atq'];

    var_dump($_SESSION);
    var_dump($persoData = PersoModel::getPerso($_SESSION['userID']['id']));
    die;
    createPerso($_SESSION['userID']['id'])
    // $statement='INSERT INTO perso (nom, vie, atq) VALUES (:nom,:vie,:atq)';
    // $requete=$connexion->prepare($statement);
    // $requete->execute([
    //     ':nom'=>$nom, ':vie'=>$vie, ':atq'=>$atq
    //     ]);
    // $statement2='INSERT INTO user_has_perso (user_id, perso_id) VALUES ($userID,$idUser)';
    // $req2 = $db->prepare($statement2);
    // $req2->execute();
    // header('Location:jeu.php');
    // exit;
?>