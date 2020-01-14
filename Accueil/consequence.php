<?php
    session_start();
    require_once 'Entity/Personnage.php';

    // require __DIR__.'../../vendor/autoload.php';
    require_once 'Model/allModel.php';
    $_SESSION['niveau']++;
    $consData = GameModel::getConsequence(intval($_POST['choix']));
    $perso = PersoModel::getPerso($_SESSION['userID']['id']);
    $niveauEnnemi = $_SESSION['niveau']-1;
    $ennemi = EnnemiModel::getEnnemi($niveauEnnemi);

    //evenement d'intro
    if(intval($_POST['choix'])==1){
        $perso->atq = $perso->atq + 1;
        PersoModel::savePerso($perso);
    }
    if(intval($_POST['choix'])==2){
        $perso->vie = $perso->vie + 2;
        PersoModel::savePerso($perso);
    }
    //rencontre evenement 1
    if(intval($_POST['choix'])==3){
        $perso->atq = $perso->atq + 1;
        PersoModel::savePerso($perso);
    }
    //si c'est un combat
    if(intval($_POST['choix'])==5){
        $recap = $perso->combat($ennemi);
        if($recap['winner']){
            PersoModel::savePerso($recap['winner']);
        }else{
            header('Location:died.php');
            exit;
        }
    }
    if(intval($_POST['choix'])==6){
        $perso->vie = $perso->vie - 2;
        PersoModel::savePerso($perso);
    }
    //objet evenement 1
    if(intval($_POST['choix'])==7){
        $perso->atq = $perso->atq + 2;
        $perso->vie = $perso->vie - 3;
        PersoModel::savePerso($perso);
    }
    //si le personnage meurt d'une crise cardiaque
    if($perso->vie <= 0){
        header('Location:died.html');
        exit;
    }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Ressources/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styleAccueil.css">
    <title>Jeu - CODING</title>
</head>
<body>
    <header>
        <?php include('../Ressources/Commun/banniere.html')?>
    </header>
    <nav>
        <?php include('../Ressources/Commun/navbar.php')?>
    </nav>
    <div class="containerJeu">
        <div class="jeu">
            <div class="texteEvent">
                <?php if(isset($recap)): ?>
                    <?php if(!$recap['winner']): ?>
                        <?= require('died.html') ?>
                    <?php endif;?>
                <?php endif;?>
                <?php if($_SESSION['niveau'] == 1 && $_POST['choix'] == 1): ?>
                    Tu as donc choisi l'épée
                <?php elseif($_SESSION['niveau'] == 1 && $_POST['choix'] == 2): ?>
                    Tu as donc choisi le bouclier
                <?php else: ?>
                    <?=$consData->narration?>
                <?php endif; ?>
                <?php if($_POST['choix'])
            </div>
            <div class="boutonChoix">
                <button><a href="jeu.php">Continuer</a></button>
            </div>
        </div>
    </div>
    <?php include('../Ressources/Commun/footer.html')?>
    <script src="JS/app.js" type="module"></script>
</body>
</html>