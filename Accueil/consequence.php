<?php
    session_start();
    require __DIR__.'../../vendor/autoload.php';
    require_once 'Model/allModel.php';
    // var_dump($_POST);
    // var_dump(intval($_POST['choix']));
    // die;
    $_SESSION['niveau']++;
    $consData = GameModel::getConsequence(intval($_POST['choix']));
    dump($consData);

    //si c'est un combat

    //si c'est une rencontre

    //si c'est un objet

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
                <?=$consData->narration?>
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