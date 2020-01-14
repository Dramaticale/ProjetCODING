<?php
    session_start();
    // require __DIR__.'../../vendor/autoload.php';
    require_once 'Model/allModel.php';
    if($_SESSION['check']!=='log'){
        header('Location: oust.php');
        exit();
    }
    $_SESSION['niveau'] = !isset($_SESSION['niveau']) ? 0 : $_SESSION['niveau'];
    $persoData = PersoModel::getPerso($_SESSION['userID']['id']);
    if($_SESSION['niveau'] < 3){
        // créer un entier aléatoire
        $random = mt_rand(1,3);
        // recuperer evenement et choix
        $gameData = GameModel::getGameData($random,$_SESSION['niveau']);

    } elseif($_SESSION['niveau'] = 3) {
        // fin de partie
        $fin = 'Vous avez triomphé... Pour l\'instant';
    }else{
        $fin = 'Vous êtes mort...';
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
            <?=$fin?>
            <?php if($_SESSION['niveau'] == 0): ?>
                C'est votre premier jour de formation, vous êtes déjà installé quand votre professeur en chef Emelynx entre dans la pièce. Plus un bruit. La présentation se fait dans le calme. Vous avez hâte de commencer car c'est votre avenir qui est en jeu.<br>
                Votre premier cours arrive, il est avec le professeur Florajax, un mage dôté d'un savoir immense, c'est lui qui vous enseignera comment être l'un des meilleurs.<br>
                Le cours commence, après une première leçon sur le langage commun HTML, il décide de vous mettre à l'épreuve. Vous le voyez agiter ses mains tout en murmurant un dialecte ancien. Après quelques instants un portail apparaît et Florajax vous fait signe d'y entrer.<br>
                Il fait sombre à l'intérieur. Soudain, vous entendez une petite voix, c'est celle de Florajax.<br>
                "Tu apprends vite <?=$_SESSION['username']?>, je vais te mettre à l'épreuve. A ta droite il y a 2 objets, une épée et un bouclier, choisi bien, tu ne peux en prendre qu'un pour le début de ton aventure."<br>
            <?php endif; ?>
            <?php if($_SESSION['niveau'] == 1): ?>
                "Je pense que tout se passera bien pour toi. Tu es dans le chateau W3C, qui renferme un savoir colossal dans ses écrits, mais également abrite un bon nombre de monstre. Tu vas devoir aller chercher un livre, on raconte qu'il est gardé par un terrible monstre. Tu vas être livré à toi même, bonne chance." La voix se tue, vous n'entendez plus rien. Vous entamez votre route quand soudain <?= $gameData['evennement']->texte?>
            <?php endif; ?>
            </div>
            <div class="boutonChoix">
            <form method="POST" action="consequence.php">
                <?php if($gameData['evennement']==false): ?>
                    <button type="submit" name="choix" value="epee">épée</button>
                    <button type="submit" name="choix" value="bouclier">bouclier</button>
                <?php else: ?>
                <?php foreach($gameData['choix'] as $choix): ?>
                    <button type="submit" name="choix" value="<?=$choix->id?>"><?=$choix->nom?></button>
                <?php endforeach; ?>
                <?php endif; ?>
            </form>
            </div>
        </div>
        <div class="infosPerso">
                Nom : <?=$persoData->nom?><br>
                Attaque : <?=$persoData->atq?><br>
                Vie : <?=$persoData->vie?>
        </div>
    </div>
    <?php include('../Ressources/Commun/footer.html')?>
</body>
</html>