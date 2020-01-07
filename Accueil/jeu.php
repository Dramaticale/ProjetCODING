<?php
    session_start();
    require('getEvent.php');
    require('choixEventIntro.php');
    $compteur=0;
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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
            <?php if($compteur==0): ?>
                <div class="texteEvent">
                    C'est votre premier jour de formation, vous êtes déjà installé quand votre professeur en chef Emelynx entre dans la pièce. Plus un bruit. La présentation se fait dans le calme. Vous avez hâte de commencer car c'est votre avenir qui est en jeu.<br>
                    Votre premier cours arrive, il est avec le professeur Florajax, un mage dôté d'un savoir immense, c'est lui qui vous enseignera comment être l'un des meilleurs.<br>
                    Le cours commence, après une première leçon sur le langage commun HTML, il décide de vous mettre à l'épreuve. Vous le voyez agiter ses mains tout en murmurant un dialecte ancien. Après quelques instants un portail apparaît et Florajax vous fait signe d'y entrer.<br>
                    Il fait sombre à l'intérieur. Soudain, vous entendez une petite voix, c'est celle de Florajax.<br>
                    "Tu apprends vite <?=$_SESSION['username']?>, je vais te mettre à l'épreuve. A ta droite il y a 2 objets, une épée et un bouclier, choisi bien, tu ne peux en prendre qu'un pour le début de ton aventure."<br>
                </div>
                <div class="boutonChoix">
                    <button><?=$data['nom']?></button>
                    <button><?=$data2['nom']?></button>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include('../Ressources/Commun/footer.html')?>
    <script src="JS/app.js" type="module"></script>
</body>
</html>